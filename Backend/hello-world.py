from re import template
from flask import Flask,render_template,request
import sqlalchemy as db
import pandas as pd
import os

template_dir = os.path.abspath('../Frontend/Webpages')
app = Flask(__name__, template_folder=template_dir)

@app.route('/', methods=["GET","POST"])
def index():
    return render_template('index.php')

@app.route('/data', methods = ["GET","POST"])
def data(): 
    if request.method == "POST":
        table_count = 0
        table_name="user"+"table"+str(table_count)
        table_count += 1
        file = request.files['csvfile']
        if not os.path.isdir('static'):
            os.mkdir('static')
        filepath = os.path.join('static', file.filename)
        file.save(filepath)
        data=[]
        data = pd.read_csv(filepath, index_col=None)
        engine = db.create_engine('mysql+pymysql://root:@localhost:3306/datavisualizer').connect()
        
        data.to_sql(con=engine, name=table_name,
                  if_exists='replace', index=False)
        metadata = db.MetaData()
        info = db.Table(table_name, metadata, autoload=True, autoload_with=engine)
        print(info.columns.keys())
        return render_template('data.html',data=data.to_html(header=None, index=None))

if __name__=="__main__":
    app.run(debug=True)
