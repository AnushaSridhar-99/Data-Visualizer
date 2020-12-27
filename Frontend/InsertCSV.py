import sqlalchemy as db
import pandas as pd
import sys

filepath = "D:\\xampp\\htdocs\\Data-Visualizer\\Frontend\\upload\\" +  str(sys.argv[1])
print(filepath)
table_count = 0
table_name = str(sys.argv[1])[:-4] + "-" + str(table_count)
data=[]
data = pd.read_csv(filepath, index_col=None)
try:
    engine = db.create_engine('mysql+pymysql://root:@localhost:3306/datavisualizer').connect()
except:
    # Failed connection
    print(0)
    exit()
while(engine.dialect.has_table(engine, table_name)):
    table_count += 1
    table_name = str(sys.argv[1])[:-4] + "-" + str(table_count)
if table_count!=0:
    table_name = str(sys.argv[1])[:-4] + "-" + str(table_count)
try:
    data.to_sql(con=engine, name=table_name,
            if_exists='replace', index=False)
    metadata = db.MetaData()
    info = db.Table(table_name, metadata, autoload=True, autoload_with=engine)
    print(1)
except:
    print(2)
    exit()


