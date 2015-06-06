sudo mkdir -p /etc/nginx/ssl &&
sudo openssl req -new -newkey rsa:4096 -nodes -out server.csr -keyout server.key &&
sudo openssl rand 48 -out /etc/nginx/ssl/ticket.key &&
sudo openssl dhparam -out /etc/nginx/ssl/dhparam4.pem 4096
