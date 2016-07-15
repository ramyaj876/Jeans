#!C:\\Python27\\python

from svg.path import parse_path
from svg.path import Path, Line, Arc, CubicBezier, QuadraticBezier
from xml.dom import minidom
import MySQLdb


def Measurement():
	str_S1 = '<?xml version="1.0" encoding="UTF-8" standalone="no"?> <svg ' + 'xmlns="http://www.w3.org/2000/svg" ' + 'xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" width="600" height="500" viewBox="-50 0 500 500" > '
	str_S2 = '<path d = "'
	str_S3 = '" inkscape:connector-curvature="0" '+ 'style="fill:none;stroke:#000000;stroke-width:3" />' 
	str_S4 = '</svg>'

	doc = minidom.parse('temp.svg')  

	path_strings = [path.getAttribute('d') for path
                in doc.getElementsByTagName('path')]

	path1 = parse_path(path_strings[0])
	path2 = parse_path(path_strings[1])

	#print "Path1: "+str(path1)
	#print "Path2: "+str(path2)

	str_Text = gen_text(path1, path2)
	fin_svg = str(str_S1) + str ('\n') + str(str_S2) + str(path1.d()) + str ('\n') + str(str_S3) + str ('\n')  + str(str_S2) + str(path2.d()) + str(str_S3) + str(str_Text) + str(str_S4)
 	
	cursor = db.cursor()
	sql = "select count(*) from svg_table;"
	cursor.execute(sql)
	c = int(cursor.fetchone()[0])
 	i = c+1
	sql = "insert into svg_table (id, svg) values( " + str(i) + ", '" + fin_svg + "');"
	cursor.execute(sql)
	comma = str(", ")
	str_sql = "INSERT INTO `rear_table`(`ID`, `SPointX`, `SPointY`, `LegOpenX`, `LegOpenY`, `LegOpenLen`, `OutseamX`, `OutseamY`, `OutseamCPX`, `OutseamCPY`, `OutseamLen`, `WaistX`, `WaistY`, `WaistLen`, `BackriseX`, `BackriseY`, `BackriseCPX`, `BackriseCPY`, `BackriseLen`, `InseamX`, `InseamY`, `InseamCPX`, `InseamCPY`, `InseamLen`) VALUES (" 
	str_sql1 = str(i) + comma + str(path1[0].start.real) + comma + str(path1[0].start.imag) + comma + str(path1[0].end.real) + comma + str(path1[0].end.imag) + comma + str(path1[0].length()) + comma 
	str_sql2 = str(path1[1].end.real) + comma + str(path1[1].end.imag) + comma + str(path1[1].control.real) + comma + str(path1[1].control.imag) + comma + str(path1[1].length()) + comma				
	str_sql3 = str(path1[2].end.real) + comma + str(path1[2].end.imag) + comma + str(path1[2].length()) + comma
	str_sql4 = str(path1[3].end.real) + comma + str(path1[3].end.imag) + comma + str(path1[3].control.real) + comma + str(path1[3].control.imag) + comma + str(path1[3].length()) + comma
	str_sql5 = str(path1[4].end.real) + comma + str(path1[4].end.imag) + comma + str(path1[4].control.real) + comma + str(path1[4].control.imag) + comma + str(path1[4].length()) + str(');')
	sql = str_sql + str_sql1 + str_sql2+ str_sql3+ str_sql4+ str_sql5
	#print "sql string = ",sql
	cursor.execute(sql)
	str_sql = "INSERT INTO `front_table`(`ID`, `SPointX`, `SPointY`, `LegOpenX`, `LegOpenY`, `LegOpenLen`, `OutseamX`, `OutseamY`, `OutseamCPX`, `OutseamCPY`, `OutseamLen`, `WaistX`, `WaistY`, `WaistLen`, `FrontriseX`, `FrontriseY`, `FrontriseCPX`, `FrontriseCPY`, `FrontriseLen`, `InseamX`, `InseamY`, `InseamCPX`, `InseamCPY`, `InseamLen`) VALUES ("
	str_sql1 = str(i) + comma + str(path2[0].start.real) + comma + str(path2[0].start.imag) + comma + str(path2[0].end.real) + comma + str(path2[0].end.imag) + comma + str(path2[0].length()) + comma 
	str_sql2 = str(path2[1].end.real) + comma + str(path2[1].end.imag) + comma + str(path2[1].control.real) + comma + str(path2[1].control.imag) + comma + str(path2[1].length()) + comma				
	str_sql3 = str(path2[2].end.real) + comma + str(path2[2].end.imag) + comma + str(path2[2].length()) + comma
	str_sql4 = str(path2[3].end.real) + comma + str(path2[3].end.imag) + comma + str(path2[3].control.real) + comma + str(path2[3].control.imag) + comma + str(path2[3].length()) + comma
	str_sql5 = str(path2[4].end.real) + comma + str(path2[4].end.imag) + comma + str(path2[4].control.real) + comma + str(path2[4].control.imag) + comma + str(path2[4].length()) + str(');')
	sql = str_sql + str_sql1 + str_sql2+ str_sql3+ str_sql4+ str_sql5
	cursor.execute(sql)
	db.commit()
	print i


def gen_text(path1, path2):
	#ext1 = '<g font-size = "30"> '
	ext2 = '<text x = "'
	ext3 = '" y = "'
	ext4 = '">'
	ext5 = '</text>'
	#ext6 = '</g>'
	strT = ''
	i = 0
	A = 65
	for i in range(len(path1)):
		strT += ext2 + str(path1[i].start.real+5) + ext3 + str(path1[i].start.imag-15) + ext4 + chr(A) + ext5
		A = A+1
	i = 0
	for i in range(len(path2)):
		strT += ext2 + str(path2[i].start.real+5) + ext3 + str(path2[i].start.imag-15) + ext4 + chr(A) + ext5
		A = A+1
	#ext1 += ext6
	return strT

db = MySQLdb.connect("localhost","root","","Test")
#print db
print "ID: "+Measurement()





# Open database connection

# prepare a cursor object using cursor() method

# F = open('svgpathexample.svg', 'r+')
# F_str = F.read()
#print F_str

# print path1
# print len(path1)
# print path1[4].length()
# print path2[4].length()



# print path1[4].length()
# print path2[4].length()


# t_file = open('F.svg', 'w')
# t_file.write (fin_svg)
# t_file.close() 



# db.close()

