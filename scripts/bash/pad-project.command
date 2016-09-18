#!/bin/bash

# Script is used as a desktop shortcut to open the following:
# - MAMP
# - Sublime Text
# - Finder App opened in path of project
# - Terminal opened in path of project
# - Chrome with BrowserSync

open /Applications/MAMP/MAMP.app
open /Applications/Sublime\ Text.app/
open ~/Documents/Programming/MAMP-Sites/PaDSpace/
cd ~/Documents/Programming/MAMP-Sites/PaDSpace/
ttab -d .
./scripts/bash/start.sh
