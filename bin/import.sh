#!/usr/bin/env sh
mkdir -p temp
cd temp
git clone https://github.com/tailwindlabs/heroicons.git
cd ..
php bin/import.php temp/heroicons
rm -rf temp