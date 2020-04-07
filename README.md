# isdown

isDown is a web service for system administrators, allowing them to check the availability of their servers

### Introduction ###

isDown gives you the ability to use a third-party for checking if your web service is down or not.
Moreover, it allows you to specify a custom expiration timeout, retrieve information in JSON or XML formats, etc.

The isDown ecosystem should not be considered a standalone server on the Internet.
Instead, it is an effective [federated network](http://en.wikipedia.org/wiki/Federation_(information_technology)).
From Wikipedia, a federated network is composed by "multiple computing and/or network providers agreeing upon standards of operation in a collective fashion".
In particular, you can install isDown on your own server and connect to other existing and working similar servers.

### Preliminary requirements ###

Following requirements should be satisfied:
* an [Apache2](https://apache.org) web server
* a publicly reachable IP address for your server

### Installation and configuration ###

1. Access the system as `root`

2. `cd` into the `/var/www` directory of your server
```
cd /var/www
```

3. Clone the repository
```
git clone https://github.com/netsecgroupcnr/isdown.git
```

4. Set permissions on the `isdown` folder
```
chgrp -R www-data isdown
```

5. Configure the web server to [serve the site](https://httpd.apache.org/docs/2.4/vhosts/examples.html) (on the `/var/www/isdown` directory)

No further configuration is required.
If needed, the `$CENTRALNODEURL` variable can be manually configured on the [settings.php](https://github.com/netsecgroupcnr/isdown/blob/master/inc/settings.php) file.

### Access ###

You can access the service through an Internet browser and opening the main website address configured.

### Output ###

Output is available as web page, or in XML and JSON format.

In the XML and JSON cases, it is possible to query the service though a common HTTP request, by adopting the following URL format.
```
http://$url/?u=$domain&t=$timeout&f=$format
```

where:
* `$url` is the domain name of the service on your website
* `$domain` is the domain to check (also, the format `https://www.example.com:8443` is allowed)
* `$timeout` is the timeout to adopt, in seconds (after the expiration of such timeout, the service will be considered unreachable)
* `$format` is the format of the generated output (allowed formats are `xml` and `json`)

### License ###

The program is licensed under the [Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License](http://creativecommons.org/licenses/by-nc-sa/3.0/).

### Credits ###

* Idea:
  * Enrico Cambiaso
* Design:
  * Enrico Cambiaso
* Development:
  * Enrico Cambiaso
* Support:
  * Maurizio Aiello
  * Gianluca Papaleo

### Contacts ###

This program is implemented by the [NetSec group of CNR-IEIIT](http://www.netsec.ieiit.cnr.it).
