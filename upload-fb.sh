#!/bin/bash
#files=`rsync -avz /home/pi/captured-images --exclude=.AppleDouble |  awk -F" " '{print $(NF)}'  | grep jpg$ | head -n -1`
files=`rsync -avz /home/pi/captured-images --exclude=.AppleDouble |  awk -F" " '{print $(NF)}'  | grep jpg$`

echo $files
for file in $files; do 
  echo "Uploading... $file"
  curl -ks -F 'access_token=CAACEdEose0cBAIBHTf8y3ueVfoFxj1GqUgHZAaooCXOH6t2vRULCMEj6Wm9ZAzENUXVAgXzJmMqYF1gMzYYFPZASV4RYlsRWYqZAnMxCNxyMKWR7PPZCE2pJCvai4z7GGFlhRzriljsppMIXYomaVDvY8aAt7YcKLGy03roCZAIv9XWZBaPRK8h8hYvB1JHJIiJ2Ba3yMD0P7FFOsmCmpHl' -F "source=@/home/pi/$file" -F 'uid=324915744349804' -F 'aid=1073741826'  -F "caption=`date '+%H:%M:%S'`" https://api.facebook.com/method/photos.upload | grep error
  
  if [[ $? -ne 0 ]]; then
    echo "Remove .. $file"
    rm "/home/pi/$file"
    #mv "/home/pi/$file" /home/pi/processed-images/
  fi
  sleep 10
done;
  


