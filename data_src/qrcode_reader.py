import cv2

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

        if data:
            print("[+] QR Code detected, data:", data)

    # display the result
    cv2.imshow("img", img)    

    if cv2.waitKey(1) == ord("q"):
        break

cap.release()
cv2.destroyAllWindows()