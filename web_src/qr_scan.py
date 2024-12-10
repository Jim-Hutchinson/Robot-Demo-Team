import cv2
import time

def qrScan(ProductID):
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
                    print("Returned Home!")
                    break

        # display the result
        cv2.imshow("img", img)    

        if cv2.waitKey(1) == ord("q"):
            break

    cap.release()
    cv2.destroyAllWindows()
    time.sleep(2)
    print("Program ended.")