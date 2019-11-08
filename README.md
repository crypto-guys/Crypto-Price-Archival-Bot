# Crypto-Price-Archival-Bot
Archives the top 100 cryptocurrency prices to the ARWEAVE blockchain

# Dependencies
You will need to register for a coinmarketcap PRO API key (this is free) get one [Here](https://pro.coinmarketcap.com/)

You will also need an Arweave Wallet (this will be a .json file save it) and some AR get those [Here](https://tokens.arweave.org/)

This script runs on a linux host all instructions are for Ubuntu 18.04

PHP 7.2

Composer 

Arweave-PHP SDK

User account with SUDO

# Install

All instructions are for Ubuntu 18.04 if you are using anything else you might need to adjust the instructions.

You should be logged in with the user account you will be using to run the script sudo is needed

The following linux packages are recommended / required

sudo apt install php-common php7.2 php7.2-cli php7.2-common php7.2-curl php7.2-gmp php7.2-json php7.2-mbstring php7.2-xml php7.2-zip cron git wget nano

Install [Composer](https://github.com/composer/composer) Instruction in the link

mkdir /arweave

cd /arweave

Install [Arweave PHP SDK](https://github.com/ArweaveTeam/arweave-php) with the following command.

composer require arweave/arweave-sdk

Open your wallet json file and copy the contents

nano jwk.json

paste the contents of you wallet json file

cntl + x to save

git clone https://github.com/crypto-guys/Crypto-Price-Archival-Bot.git

nano cryptopricebot.php

enter you CoinMarketCap api key on line ??

cntl + x to save


# Usage
crontab -e

Add the following line to run the script every 15 minutes and log all output to transaction.log

0,15,30,45 * * * * php -f /arweave/cryptopricebot.php >> /arweave/transaction.log


# Cost
This bot appears to cost about .05 USD per day

# License
GNU General Public License v3.0
