from flask import Flask, render_template, Response
import cv2

app = Flask(__name__)

# Initialize the camera (assuming you have a camera connected at /dev/video0)
camera = cv2.VideoCapture(0)

# Ensure the camera opened successfully
if not camera.isOpened():
    raise Exception("Could not open video device")

# Define the function to generate frames
def generate_frames():
    while True:
        # Capture frame-by-frame
        success, frame = camera.read()
        if not success:
            break
        else:
            # Encode frame as JPEG
            ret, buffer = cv2.imencode('.jpg', frame)
            frame = buffer.tobytes()
            
            # Yield frame in byte format
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

# Define route to serve video feed
@app.route('/video_feed')
def video_feed():
    return Response(generate_frames(),
                    mimetype='multipart/x-mixed-replace; boundary=frame')

# Define main route to display the webpage
@app.route('/')
def index():
    return "<html><body><h1>Raspberry Pi Camera Stream</h1><img src='/video_feed'></body></html>"

# Run the Flask app
if __name__ == "__main__":
    app.run(host='0.0.0.0', port=5000)
