# Crypto-Price-Archival-Bot
Archives the top 100 cryptocurrency prices to the ARWEAVE blockchain


# Dependencies
You will need to register for a coinmarketcap PRO API key (this is free) get one [Here](https://pro.coinmarketcap.com/)

You will also need an Arweave Wallet (this will be a .json file save it somewhere) with some Arweave tokens [Get them Here](https://tokens.arweave.org/)

A Linux Host 

PHP 7.2

Composer 

Arweave-PHP SDK


# Install Instructions

All instructions are for Ubuntu 18.04 if you are using anything else you might need to adjust the instructions.

You should be logged in with the user account you will be using to run the script sudo is needed

The following linux packages are recommended / required

sudo apt install php-common php7.2 php7.2-cli php7.2-common php7.2-curl php7.2-gmp php7.2-json php7.2-mbstring php7.2-xml php7.2-zip cron git wget nano

sudo mkdir /arweave

sudo chown yourusername:yourgroup /arweave

cd /arweave

Install [Composer](https://getcomposer.org/download/) with the following commands

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

php composer-setup.php

php -r "unlink('composer-setup.php');"


Install [Arweave PHP SDK](https://github.com/ArweaveTeam/arweave-php) with the following command.

php composer.phar require arweave/arweave-sdk

Open your wallet json file and copy the contents

nano jwk.json

paste the contents of you wallet json file

cntl + x to save

git clone https://github.com/crypto-guys/Crypto-Price-Archival-Bot.git

mv /arweave/Crypto-Price-Archival-Bot/* /arweave

rm -rf /arweave/Crypto-Price-Archival-Bot/

nano cryptopricebot.php

enter you CoinMarketCap api key on line 31 of /arweave/cryptopricebot.php

cntl + x to save

chmod +x cryptopricebot.php

# Usage
crontab -e

Add the following line to run the script every 15 minutes and log all output to transaction.log

0,15,30,45 * * * * php -f /arweave/cryptopricebot.php >> /arweave/transaction.log


# Example Output
[Top 100 prices 2019-11-08 T21:30](https://arweave.net/vOsK1qQUWh8spr3atOZaMgvD6HEjmHaXfo04LQVVer8)

# Cost
This bot appears to cost about .05 USD per day

# License
GNU General Public License v3.0
