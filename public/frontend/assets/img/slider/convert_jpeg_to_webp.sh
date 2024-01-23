#!/bin/bash

find . -type f -name "*.jpg" -o -name "*.jpeg" | while read filename; do
  cwebp -q 80 "$filename" -o "${filename%.*}.webp"
  rm "$filename"
done

