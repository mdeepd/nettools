# nettools
You can analyze network connectivity, trace routes, using different server, check ping, look up domain information, and calculate subnets (IPv4 and IPv6).
Follow this steps if you want host this tools (Tested on Debian server):
Ready your server:
Since we are executing network commands like ping, traceroute, nslookup, mtr, and whois, make sure they are installed on your server.
sudo apt update
sudo apt install apache2 php php-curl traceroute dnsutils mtr whois -y
Enable and start the Apache service:
sudo systemctl enable apache2
sudo systemctl start apache2
Edit php.ini to disable dangerous functions if needed:
sudo nano /etc/php/*/apache2/php.ini
disable_functions = exec,shell_exec,system,passthru
Restart Apache:
sudo systemctl restart apache2
Copy all files with folder and place it to your hosting dirctory.
Ensure proper ownership:
sudo chown -R www-data:www-data /var/www/html/network-tools
sudo chmod -R 755 /var/www/html/network-tools
(Make sure you put proper directory location)
Now you can access the webpage. http://your-server-ip/network-tools/
If IP calculator is not working:
Make sure the ipcalc tool is installed on your server.
sudo apt update
sudo apt install ipcalc -y
sudo systemctl restart apache2
Note:
There are two css file. One is style.css and another one inside css folder style.css. The css/style.css is for traceroute2.php
There are two file of traceroute. One is traceroute.php and another one is traceroute2.php. If you want to use traceroute for multiple location then use traceroute2.php
Steps you need to follow to use traceroute2.php
To achieve this, you need to have multiple servers in different locations where the traceroute command will run. The idea is:
The user selects a server location from a dropdown.
Based on the selection, the request is sent to the selected server via SSH.
The remote server runs traceroute and returns the result to the user.
Make sure traceroute is installed on all your remote servers:
sudo apt update
sudo apt install traceroute -y
Your main server needs to connect to remote servers without a password using SSH keys.
Manually create the .ssh directory inside /var/www/:
sudo mkdir -p /var/www/.ssh
sudo chown -R www-data:www-data /var/www/.ssh
sudo chmod 700 /var/www/.ssh
Now check if it was created:
ls -ld /var/www/.ssh
Run this command to switch to the www-data user:
sudo -u www-data bash
Generate an SSH key as www-data: (sudo may not work for www-data. You may need to add www-data to visudo file. But it is not recommended)
sudo -u www-data ssh-keygen -t rsa -b 2048 -f /var/www/.ssh/id_rsa -N ""
Set proper permissions:
sudo chmod 600 /var/www/.ssh/id_rsa
sudo chmod 644 /var/www/.ssh/id_rsa.pub
Now, copy the public key to each remote server.
Run the following from your main server (as root or your normal user):
sudo -u www-data ssh-copy-id -i /var/www/.ssh/id_rsa.pub user@192.168.1.101
sudo -u www-data ssh-copy-id -i /var/www/.ssh/id_rsa.pub user@192.168.1.102
Replace:
user with the actual username on the remote server.
192.168.1.101 with your actual remote server's IP.
If prompted, type yes and press Enter.
Try logging into the remote server without a password:
sudo -u www-data ssh -i /var/www/.ssh/id_rsa user@192.168.1.101 "echo 'SSH working'"
If it prints: "SSH working" Then passwordless SSH is working.
Restart Apache to apply the changes: sudo systemctl restart apache2
Now check if it is working on multiple location or not.