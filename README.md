# CTF-Bank-Hi-uhc-WEB
A machine that I made for UHCv32 

to start:
```bash 
docker build -t bankhi .
docker run -dp 80:80 bankhi
docker exec -it <container id> bash
```
inside container:
```bash
bash /root/entrypoint.sh
nohup bash ./bot.sh &
```
