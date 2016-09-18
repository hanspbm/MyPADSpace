#!/bin/bash

#If there's an issue with the command, make sure to adjust the port or the project name
browser-sync start --browser "Google Chrome" --proxy localhost:3000/PaDSpace/ --files="*.php"