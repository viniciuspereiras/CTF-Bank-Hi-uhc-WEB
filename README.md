# CTF-Bank-Hi-uhc-WEB
- A machine that I made for UHCv32 
- Official WriteUP -> https://www.notion.so/UHCV32-Classificat-ria-Web-Official-Write-Up-BankHi-44017986f47d4b21902d7498a53f2faa
# To start:
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
