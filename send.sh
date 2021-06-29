#!/usr/bin/env bash

# Author: Dmitri Popov, dmpop@linux.com
# License: GPLv3 https://www.gnu.org/licenses/gpl-3.0.txt

# 0 10 * * * cd /path/to/zaino/ && ./send.sh

line=$(cat zaino.txt | sort --random-sort | head -n 1)

curl --url 'smtps://mail.hello.xyz:465' --ssl-reqd \
 --mail-from me@hello.xyz \
 --mail-rcpt you@hello.xyz \
 --user 'me@hello.xyz:SECRET' \
 -T <(echo -e 'From: me@hello.xyz\nTo: you@hello.xyz\nSubject: Zaino\n'$line)
