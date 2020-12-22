import pandas as pd

df = pd.read_csv('static/Book1.csv', index_col=None)
# df = df.drop(df.columns[[0]], axis=1)
print(df)