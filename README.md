# Crypto-Price-Archival-Bot
Archives the top 100 cryptocurrency prices to the ARWEAVE blockchain






# Install
sudo apt install php-common php7.2 php7.2-cli php7.2-common php7.2-curl php7.2-gmp php7.2-json php7.2-mbstring php7.2-xml php7.2-zip cron git wget

Install composer

mkdir /arweave
cd /arweave

Install the [Arweave PHP SDK](https://github.com/ArweaveTeam/arweave-php)
composer require arweave/arweave-sdk
git clone thisrepo


# Usage
crontab -e
add the following line to run the script every 15 minutes
0,15,30,45 * * * * php -f /arweave/cryptopricebot.php >> /arweave/transaction.log
