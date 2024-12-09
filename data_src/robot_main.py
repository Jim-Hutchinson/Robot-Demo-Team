import mysql.connector
from db_config import mydb
import cv2

lastRecord = []
checkActive = False
while True:
    cursor = mydb.cursor()
    cursor.execute("select * from live_order order by orderedOn desc limit 1")

    results = cursor.fetchall()
    if results!=lastRecord and checkActive == True:
        print("Results Changed!")
        ProductID = results[0][1]
        productFound = False

        # initialize the cam
        cap = cv2.VideoCapture(0)
        print("QR Reader Active!")

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

                if productFound==False:
                    if data==ProductID:
                        print("ID "+ProductID+" Found!")
                        productFound = True
        
                if productFound==True:
                    if data=="Home":
                        print("Returned Home! Ending program")
                        break

            # display the result
            cv2.imshow("img", img)    

            if cv2.waitKey(1) == ord("q"):
                break

        cap.release()
        cv2.destroyAllWindows()
    lastRecord = results
    checkActive = True