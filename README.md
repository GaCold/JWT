# in window
- download openssl

# generate private key
- openssl genrsa -out private_key.pem 2048

# generate public key
- openssl rsa -in private_key.pem -pubout -out public_key.pem
