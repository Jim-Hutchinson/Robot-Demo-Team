import mysql.connector
from db_config import mydb
import cv2

Product = ("'"+input("Select product: ")+"'")
cursor = mydb.cursor()
cursor.execute("SELECT productId FROM product WHERE productName = "+Product)

results = cursor.fetchall()

ProductID = str(results[0][0])

# initialize the cam
cap = cv2.VideoCapture(0)

# initialize the cv2 QRCode detector
detector = cv2.QRCodeDetector()

while True:
    _, img = cap.read()

    # detect and decode
    data, bbox, _ = detector.detectAndDecode(img)

    # check if there is a QRCode in the image
    if bbox is not None and len(bbox) > 0:
        # display the image with lines
        for i in range(len(bbox)):
            # draw all lines
            pt1 = tuple(map(int, bbox[i][0]))
            pt2 = tuple(map(int, bbox[(i+1) % len(bbox)][0]))
            cv2.line(img, pt1, pt2, color=(255, 0, 0), thickness=2)

        if data==ProductID:
            print("ID "+ProductID+":"+Product+" Found!")
            break
        else:
            print("ID not found.")
            print("ID Found was "+data)

    # display the result
    cv2.imshow("img", img)    

    if cv2.waitKey(1) == ord("q"):
        break

cap.release()
cv2.destroyAllWindows()