from flask import Flask,render_template, request
import MySQLdb
import mysql.connector
import pandas as pd
app = Flask(__name__)

@app.route("/test.html")

def mysqlconnect():

    #Trying to connect
    try:
        db_connection = mysql.connector.connect(user='root', password='',
                              host='127.0.0.1',
                              database='rso_matcher')
    # If connection is not successful
    except:
        print("Can't connect to database")
        return 0
    # If Connection Is Successful
    print("Connected")

    # Making Cursor Object For Query Execution
    cursor=db_connection.cursor(buffered=True)

    # Executing Query
    cursor.execute("SELECT CURDATE();")

    # Above Query Gives Us The Current Date
    # Fetching Data
    m = cursor.fetchone()

    # Printing Result Of Above
    #print("Today's Date Is ",m[0])

    df = recommend(db_connection, cursor, "aashnaw2")

    # Closing Database Connection
    db_connection.close()

    return render_template("teest.html", ages=df)

def recommend (db_connection, cursor, NetID):

    rso = "SELECT * From RSO"
    rso_df = pd.read_sql(rso, db_connection)

    user = "SELECT * From Users"
    user_df = pd.read_sql(user, db_connection)

    members = "SELECT * From RSO_members"
    members_df = pd.read_sql(members, db_connection)


    user_wanted = user_df[user_df['netid']==NetID]

    ass_member = members_df[members_df['netid'] == NetID]

    ass_rsos = pd.DataFrame()

    for index, row in ass_member.iterrows():
        #print(row['Title'])
        ass_rsos = ass_rsos.append(rso_df[rso_df['Title'] == row['Title']])

    rso_df['Similarity'] = 0
    for index in range(ass_rsos.shape[0]):
        for column in rso_df.columns[:len(rso_df.columns) - 1]:
            for row in range(rso_df.shape[0]):
                if (rso_df.iloc[row][column] == ass_rsos[column].iloc[index]):
                    rso_df['Similarity'][row] = rso_df['Similarity'][row] + 1


    best_df = rso_df.nlargest(5, 'Similarity')
    # print(best_df)
    return best_df


    # Function Call For Connecting To Our Database
mysqlconnect()
if __name__ == "__main__":
    app.run()
