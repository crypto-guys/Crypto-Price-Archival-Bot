# Crypto-Price-Archival-Bot
Archives the top 100 cryptocurrency prices to the ARWEAVE blockchain




# Dependencies
You will need to register for a coinmarketcap PRO API key (this is free) get one [Here](https://pro.coinmarketcap.com/)

# Install
sudo apt install php-common php7.2 php7.2-cli php7.2-common php7.2-curl php7.2-gmp php7.2-json php7.2-mbstring php7.2-xml php7.2-zip cron git wget

Install [Composer](https://github.com/composer/composer) Instruction in the link

mkdir /arweave

cd /arweave

Install [Arweave PHP SDK](https://github.com/ArweaveTeam/arweave-php) with the following command.

composer require arweave/arweave-sdk

git clone https://github.com/crypto-guys/Crypto-Price-Archival-Bot.git


# Usage
crontab -e

Add the following line to run the script every 15 minutes and log all output to transaction.log

0,15,30,45 * * * * php -f /arweave/cryptopricebot.php >> /arweave/transaction.log

# Cost
It does cost money to save data to arweave this bot appears to cost about .05 USD per day
