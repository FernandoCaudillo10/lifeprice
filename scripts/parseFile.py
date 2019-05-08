import csv


def convertDiag(info):
	temp = ""

	for s in info:
		temp += s + " "

	return temp

def main():
	with open("info.csv") as csvfile:
		csvfile.readline()
		readCSV = csv.reader(csvfile, delimiter=',')
		f = open("data_CA.txt", "w+")

		used = 0;
		diag_id_set = set()	
		
		for row in readCSV:
				used+=2;
				info = row[0].split()
				info.pop(1)
				info.pop(-1)
				info.pop(-1)
				if len(info) is not 0:
					diag_id = info[0]
					info.pop(0) 

					diag = convertDiag(info)
					provider = row[2]
					addr = row[3]
					region = row[7]
					cost = row[10]

					
					if "CA" in region:
						f.write('INSERT INTO diagnosisToFacility VALUES("'+provider+'", '+diag_id+');\n')
						f.write('INSERT INTO facility_table VALUES("'+provider+'", "'+addr+'", "'+region+'", '+cost+');\n')

					diag_id_set.add('"'+diag+'", '+diag_id)
		
		for s in diag_id_set:
			f.write("INSERT INTO diagnosis_table VALUES("+s+");\n")		
			used+=1;
				
	f.close()
main()	
					
