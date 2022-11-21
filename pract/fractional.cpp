#include <stdio.h>
#include <conio.h>
#include <iostream>
using namespace std;

int main(){	
	float ratio[5];
	int maxWeight = 50, 
		remWeight = maxWeight, 
		n=3;
	int profits[n] = {100, 60, 120}, 
	weights[n] = {20, 10, 30};
	float result[n]  = {0, 0, 0};

//	CALCULATE RATIOS
	for(int i=0; i<n; i++){
		ratio[i] = (float) profits[i]/weights[i];		
	}
	
//	SORT VALUES
	for(int j=0; j<n-1; j++){
		for(int i=0; i<n-i-1; i++){
			if(ratio[i]<ratio[i+1]){
				int temp = ratio[i];
				ratio[i] = 	ratio[i+1];
				ratio[i+1] = temp;
				
				temp = profits[i];
				profits[i] = profits[i+1];
				profits[i+1] = temp;         
		
				temp = weights[i];
				weights[i] = weights[i+1];
				weights[i+1] = temp;
			}
		}
	}
	
	for(int i=0; i<n; i++){
		if(remWeight>weights[i]){
			remWeight = remWeight-weights[i];
			result[i]=1;
		}else if(remWeight>0){
			result[i]= (float) remWeight/weights[i];
		}
	}
	
//	DISPLAY VALUES
	for(int i=0; i<n; i++){
		cout << profits[i] << "\t";
		cout << weights[i] << "\t";
		cout << ratio[i] << "\t";
		cout << result[i] << "\t";
		cout << "\n";
	}
}
