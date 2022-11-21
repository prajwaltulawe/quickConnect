#include <iostream>

using namespace std;

int main(){
	
	int n = 3, 
		capacity = 6,
		weights[n] = {1, 2, 3},
		values[n] =	{10, 15, 40},		
		result[n+1][capacity+1];
	
//	DYNAMIC APPROACH
	for(int i=0; i<n+1; i++){
		for(int j=0; j<capacity+1; j++){
			
//			FOR 1ST ROW AND 1ST COLUMN
			if( i==0 || j==0 ){
				result[i][j]=0;	
			}
			
//			MAIN CONDITION
			else if(weights[i-1]<=j){
				result[i][j] = max(result[i-1][j-weights[i-1]]+values[i-1], result[i-1][j]);
			}
			
//			IF CURRENT WEIGHT CANNOT BE INSERTED IN BAG
			else{
				result[i][j] = result[i-1][j];
			}
		}
	}
	
//	DISPLAYING RESULT
	for(int i=0; i<n+1; i++){
		for(int j=0; j<capacity+1; j++){
			cout << result[i][j] << "\t";
		}
		cout << "\n";
	}
	
	cout << "MAXIMUM WEIGHT : " << result[n][capacity]; 
}
