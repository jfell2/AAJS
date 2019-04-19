#from flask import Flask,render_template, request
import MySQLdb
import mysql.connector
import pandas as pd
import numpy as np
import sys
#app = Flask(__name__)

#@app.route("/test.html")

def mysqlconnect(email):
    
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
    #print("Connected")

    # Making Cursor Object For Query Execution
    cursor=db_connection.cursor(buffered=True)

# Executing Query
    cursor.execute("SELECT CURDATE();")

# Above Query Gives Us The Current Date
# Fetching Data
    m = cursor.fetchone()
    
    # Printing Result Of Above
    #print("Today's Date Is ",m[0])
    
    df = recommend(db_connection, cursor, email)
    
    # Closing Database Connection
    db_connection.close()
    return df

#return render_template("teest.html", ages=df)

def recommend (db_connection, cursor, email):
    NetID = email[0:email.find('@')]
    
    rso = "SELECT * From RSO"
    rso_df = pd.read_sql(rso, db_connection)
    
    user = "SELECT * From Users"
    user_df = pd.read_sql(user, db_connection)
    
    members = "SELECT * From RSO_members"
    members_df = pd.read_sql(members, db_connection)
    
    user_wanted = user_df[user_df['netid']==NetID]
    
    user_df['Similarity'] = 0.00000
    
    for index in range(user_wanted.shape[0]):
        for column in user_df.columns[:len(user_df.columns) - 1]:
            for row in range(user_df.shape[0]):
                user_df['Similarity'][row] = user_df['Similarity'][row] + levenshtein_ratio_and_distance(str(user_df.iloc[row][column]), str(user_wanted[column].iloc[index]))

#print (user_df)
    best_user = user_df.nlargest(5, 'Similarity')
    if NetID in members_df.values:
        compare_NetID = best_user.iloc[0]['netid']
    else:
        compare_NetID = best_user.iloc[1]['netid']
#print (compare_NetID)

    ass_member = members_df[members_df['netid'] == compare_NetID]

    ass_rsos = pd.DataFrame()

    for index, row in ass_member.iterrows():
    #print(row['Title'])
        ass_rsos = ass_rsos.append(rso_df[rso_df['Title'] == row['Title']])
    
    rso_df['Similarity'] = 0.00000
    for index in range(ass_rsos.shape[0]):
        for column in rso_df.columns[:len(rso_df.columns) - 1]:
            for row in range(rso_df.shape[0]):
                #if (rso_df.iloc[row][column] == ass_rsos[column].iloc[index]):
                #rso_df['Similarity'][row] = rso_df['Similarity'][row] + 1
                rso_df['Similarity'][row] = rso_df['Similarity'][row] + levenshtein_ratio_and_distance(rso_df.iloc[row][column], ass_rsos[column].iloc[index])


    best_df = rso_df.nlargest(5, 'Similarity')
#best_df = rso_df.sort_values('Similarity', ascending = False).head(5)
#print(best_df)
#best_df.to_html('filename.html')
    print (best_df.to_string(index=False))
def levenshtein_ratio_and_distance(s, t, ratio_calc = True):
    # """ levenshtein_ratio_and_distance:
    #     Calculates levenshtein distance between two strings.
    #     If ratio_calc = True, the function computes the
    #     levenshtein distance ratio of similarity between two strings
    #     For all i and j, distance[i,j] will contain the Levenshtein
    #     distance between the first i characters of s and the
    #     first j characters of t
    #     """
    # Initialize matrix of zeros
    rows = len(s)+1
    cols = len(t)+1
    distance = np.zeros((rows,cols),dtype = int)
    
    # Populate matrix of zeros with the indeces of each character of both strings
    for i in range(1, rows):
        for k in range(1,cols):
            distance[i][0] = i
            distance[0][k] = k
    # Iterate over the matrix to compute the cost of deletions,insertions and/or substitutions
    for col in range(1, cols):
        for row in range(1, rows):
            if s[row-1] == t[col-1]:
                cost = 0 # If the characters are the same in the two strings in a given position [i,j] then the cost is 0
            else:
                # In order to align the results with those of the Python Levenshtein package, if we choose to calculate the ratio
                # the cost of a substitution is 2. If we calculate just distance, then the cost of a substitution is 1.
                if ratio_calc == True:
                    cost = 2
                else:
                    cost = 1
            distance[row][col] = min(distance[row-1][col] + 1,      # Cost of deletions
                                     distance[row][col-1] + 1,          # Cost of insertions
                                     distance[row-1][col-1] + cost)     # Cost of substitutions
    if ratio_calc == True:
        # Computation of the Levenshtein Distance Ratio
        Ratio = ((len(s)+len(t)) - distance[row][col]) / (len(s)+len(t))
        #print(Ratio)
        return Ratio
# else:
#     # print(distance) # Uncomment if you want to see the matrix showing how the algorithm computes the cost of deletions,
#     # insertions and/or substitutions
#     # This is the minimum number of edits needed to convert string a to string b
#     return "The strings are {} edits away".format(distance[row][col])

# Function Call For Connecting To Our Database
#print(sys.argv[1])
pd.set_option('display.max_rows', 500)
pd.set_option('display.max_columns', 500)
pd.set_option('display.width', 1000)
pd.set_option('colheader_justify', 'center')
df = mysqlconnect(sys.argv[1])
#print (df)
# if __name__ == "__main__":
#     app.run()
