# QR Code Generator
import segno
import os
import shutil
ID = input("Input Wanted ID: ")

#Generate QR Codes
qrcode = segno.make_qr(ID)
qrcode.save("robot_qrcode_ID"+ID+".png",
            scale=5)

#TODO Move QR Code Generated into QRCodes folder