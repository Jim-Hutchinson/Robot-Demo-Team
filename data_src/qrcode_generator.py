# QR Code Generator

import segno

#Generate QR Codes
for i in range(5):
    qrcode = segno.make_qr(str(i+1))
    qrcode.save("robot_qrcode"+str(i+1)+".png",
                scale=5)