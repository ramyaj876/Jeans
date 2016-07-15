import sys, json
from Gen import Generate
import MySQLdb

db = MySQLdb.connect("localhost","root","","Test")
data = '{"1":"771","2":"3753.5","3":"1302","4":"1488.92","5":"2860","6":"771","7":"3754.46","8":"1267.89","9":"650","10":"3065.7"}'
print data
datajs = json.loads(data)
print datajs
G = Generate(db)
G.getMatches(data)

# print "<br>0  From myScript.py, Argv:" + sys.argv[1]
# try:
#     data =  sys.argv[1]
# except:
#     print "ERROR"

# print "<br>1  before json.loads  " 
# datajs = json.loads(data)

# #J = json.dumps(data)
# #print "<br><br>json.dumps:  J:"+J
# # print data['ID']

# print "<br>2 datajs object = " 
# print datajs
# # print "<br>3 datajs[''] =  " 
# # print datajs['ID1']
# print "<br>"

# # tmp = ""
# # for i in datajs:
# #     tmp = datajs[str(i)]
# #     print "<br>" + i  +"***" 
# #     print tmp + "***"
# i = 0
# for i in datajs:
# 	print i
# 	tmp = datajs[i]
# 	print tmp

# key = datajs.keys()
# print "<br>"
# for i in range(len(key)):
# 	key[i] = int(key[i])
# key.sort()
# for i in range(len(key)):
# 	key[i] = str(key[i])
# print "Hello"+str(len(key))
# print "<br>"
# i = 0
# while (i <= 9):
# 	print key[i]
# 	i = i+1

#print str(data) +'***'+ str(J) +'***'+ str(J['2'])


