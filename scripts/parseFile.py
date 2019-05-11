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
		diagToFac = set()	
		facility_set = set()

		for row in readCSV:
				used+=2;
				info = row[0].split()
				#print("1: ", info)
				info.pop(1)
				if len(info) is not 0:
					diag_id = info[0]
					info.pop(0) 

					diag = convertDiag(info)
					provider = row[2]
					addr = row[3]
					region = row[7]
					cost = row[10]

					temp = provider+" "+region		
					if "CA" in region:
						#print("r: ", row,"i: ", info, "d:", diag, "p: ", provider, "a: ", addr, "r: ", region,"c: ", cost);
						f.write('INSERT INTO diagnosisToFacility VALUES("'+provider+'", "'+diag+'", '+cost+');\n')
						if temp not in facility_set:
							#f.write('INSERT INTO facility_table VALUES("'+provider+'", "'+addr+'", "'+region+'");\n')
							facility_set.add(temp)

						diagToFac.add('"'+diag +'", "'+diag_id+'"')
		
		for s in diagToFac:
			#f.write("INSERT INTO diagnosis_table VALUES("+s+");\n")		
			used+=1;
				
	f.close()
main()	
					
