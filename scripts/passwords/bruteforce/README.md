# Different scripts to help you find your passwords

Recently I have changed my passwords for my SSH key and GPG key and guess waht - I have forgotten them 3 days later. I remember what the words are and what is the pattern, so I just needed to test all possible combinations. This made me to write the `ssh_gpg.php` script.


## SSH and GPG passwords

Set your password template in the `$string` var and define possible changes in the `$changes` array. For SSH you will need to provide the location of your ssh private key. The last thing is to uncomment the method you would like to use for SSH or GPG.


**PS**
Scripts are not best for preformance and have been written to find my own passwords, so do not expect you will be able to "hack" someones password with them. Additionally they can be approved to reuse functionality.
