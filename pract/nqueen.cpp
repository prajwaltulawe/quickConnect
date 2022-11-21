#include<iostream>
using namespace std;

//Queen Array, total col, the queen number, queen pos    
void placeQueen(int X[], int n, int q, int col){
	if(q < n){
		//When to stop column check
		bool stop;
		if(q != 0){
			//Check if any queen is attacking in current column and keep checking until stop is true i.e. no queen is sttacking
			do{
				stop = true;	
				for(int otherQ = 0; otherQ<q; otherQ++){
					if((X[otherQ] == col) || (q - otherQ == col - X[otherQ]) || (q - otherQ == X[otherQ] - col)){
						col = col + 1;
						stop = false;
					}
				}
			}while(stop == false);
		}
		//Now try placing the next queen
		if(col < n){
			X[q] = col;
			placeQueen(X, n, q+1, 0);
		}
		//Try placing the previous queen with one col forward
		else{
			placeQueen(X, n, q-1, X[q-1]+1);
		}
	}
}

int main(){
	int n;
	//bool check_condition, check_backtrack;
	cout<<"Input no. of queens - ";
	cin>>n;
	
	//Creating matrix
	int board[n][n];
	
	//Queen position in row
    int X[n];

    //Algo
	placeQueen(X, n, 0, 0);

    //Print
	cout<<endl;
    for(int x = 0; x<n; x++){
		for(int y = 0; y<n; y++){
			if(y == X[x]){
				cout<<"Q";
			}else{
				cout<<"X";
			}
			cout<<" ";
		}
		cout<<endl;				
	}
	
	return 0;
}
