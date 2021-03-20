# Letsencrypt and Certbot

Letsencrypt will stop the support of `ACMEv1` on June 1, 2021. This means that everyone stuck on old OS versions will not be able to update and user `ACMEv2`. I need to support such servers and start checking the possible options reading the documenations. 


## User docker on the server

First option is to use `docker` on your server and map all required paths, so certbot will be able to store it's configuration, verify the ownership and download the certificate. With some play around may be you will be able to make it to modify your web server configuration but I'm not fan of this. 

To be able to use this method you will need to:

* Install `docker` on the server
* Execute command like the one bellow (you can add all required params to automate this process)

```bash
sudo docker run -it --rm --name certbot \
            -v "/etc/letsencrypt:/etc/letsencrypt" \
            -v "/var/lib/letsencrypt:/var/lib/letsencrypt" \
            certbot/certbot certonly
```

There are options to use DNS plugins. There are different docker images for this.

The big disadvantage of this method is that you need to install `docker` on the server. This is not a good idea, espetially if it's a production server and you do not use docker there for something else.
 
More info [Running with Docker](https://certbot.eff.org/docs/install.html#running-with-docker)


## User docker or certbot on another machine

The other option is to install `certbot` or `docker` on another machine. The chalange here is to pause the script, so you can create the require file or DNS changes. For this purposes the `--manual` option should be used. For example the follwoing commnd bellow can be used

```bash
docker run -it --rm  --name certbot \
            -v "/tmp/letsencrypt:/etc/letsencrypt" \
            -v "/tmp/letsencrypt:/var/lib/letsencrypt" \
            certbot/certbot certonly --manual
```

This command will pause the execute and will ask you to create the required file on your web server, so the validation can pass. The output will look something like

```
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Create a file containing just this data:

EOVdWMlGDybM8-g5rNPgAjAg7ki7Fl8UDF85c5hpUmw.C5mu69H3CZkm7OKTtP_vM-5PbDYuNcDukPd-nMCqMGc

And make it available on your web server at this URL:

http://your.domain.com/.well-known/acme-challenge/EOVdWMlG6ybMi0g5rNPgAjAg7Di7FlGUDF85c5hpUmw

- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
Press Enter to Continue

```

The final certificate files will be in `/tmp/letsencrypt`. Saved configuration will also be there.
