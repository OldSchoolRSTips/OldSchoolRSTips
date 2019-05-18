#!/usr/bin/python3

# Author: Austin Hyder (DoctorMooch)
# Generates JSON for OSRSTips from the specified input
# File and outputs to the specified output file.
#
# Examples: 
#   python3 JSONGenerator.py infile.txt outfile.txt
#   ./JSONGenerator.py infile.txt outfile.txt

import os
import sys
import json

def main() :

    # Check for a valid number of arguments
    if (len(sys.argv) != 3):
        print("Please check your command. The first argument should be the input file while the second is the output.\nExample: python3 JSONGenerator.py infile.txt outfile.txt")
        exit(1)

    # Grab file names from the command line
    inputFile = sys.argv[1]
    outputFile = sys.argv[2]

    # Check for existence of files 
    inputFileExists = os.path.isfile(inputFile)
    outputFileExists = os.path.isfile(outputFile)

    if not inputFileExists:
        print("Specified input file could not be found.")
        exit(1)

    # Get user confirmation that the file they specified should be overwritten
    elif outputFileExists:
        choice = input("Output file already exists. Overwrite? (y/n)\n") 
        if (choice.lower() != "y"):
            print("Aborting!")
            exit(1)

    # Data is good and choices (if any) are confirmed, proceede

    tipNumber = 100     # Tips start at 100

    tips = []

    inFile = open(inputFile, "r")
    outFile = open(outputFile, "w")

    # Set up the basic object for a single tip
    for line in inFile:
        tips.append({
            'id': tipNumber,
            'text': line.strip()       # Use strip to remove trailing \n
        })

        tipNumber += 1

    # Export tips to file    
    outFile.write(json.dumps(tips, indent=2))
    
    exit(0)

main()