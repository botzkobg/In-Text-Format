<?php

$sshKeyFile = '/home/user/.ssh/id_rsa';
$string = 'MyPassword';

$changes = [
	0 => ['m', 'M'],
	2 => ['p', 'P', '9'],
];

$keys = generateAll($string, $changes);
array_unique($keys);
$count = count($keys);
echo "Found $count options\n";
for($i = 0; $i < $count; $i++) {
	$key = $keys[$i];
	//$isValid = trySSHKey($sshKeyFile, $key);
	//$isValid = tryGPGKey($key);
	if ($isValid) {
		echo "$key\n";
		exit();
	}
}


function generateAll(string $string, array $changes)
{
	$keys = [];
	if (empty($changes)) {
		return $keys;
	}
	$position = key($changes);
	$chars = $changes[$position];
	unset($changes[$position]);
	foreach($chars as $char) {
		$generated = $string;
		$generated[$position] = $char;
		$keys[] = $generated;
		$newKeys = generateAll($generated, $changes);
		$keys = merge($keys, $newKeys);
	}

	return $keys;
}

function merge(array $a, array $b): array
{
	$count = count($b);
	for($i = 0; $i < $count; $i++) {
		$a[] = $b[$i];
	}

	return $a;
}

function tryGPGKey(string $key): bool
{
	echo '.';
	$result = shell_exec("gpg --batch --pinentry-mode loopback --passphrase '$key'  --export-secret-keys 2>/dev/null");
	return (bool) $result;
}

function trySSHKey(script $sshKeyFile, string $key): bool
{
	echo '.';
	$result = shell_exec("ssh-keygen -P '$key' -y -f $sshKeyFile 2>/dev/null");
	return (bool) $result;
}
