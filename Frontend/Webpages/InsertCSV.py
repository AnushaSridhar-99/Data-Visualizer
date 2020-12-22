import sqlalchemy as db
import pandas as pd
import sys

filepath = "D:\\xampp\\htdocs\\DataVisualizer\\Frontend\\Webpages\\upload\\" +  str(sys.argv[1])
print(filepath)
table_count = 0
table_name = "user"+"table"+str(table_count)
table_count += 1
data=[]
data = pd.read_csv(filepath, index_col=None)
engine = db.create_engine('mysql+pymysql://root:@localhost:3306/datavisualizer').connect()

data.to_sql(con=engine, name=table_name,
            if_exists='replace', index=False)
metadata = db.MetaData()
info = db.Table(table_name, metadata, autoload=True, autoload_with=engine)
print(info.columns.keys())

