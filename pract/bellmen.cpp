#include <stdio.h>
#include <iostream>
using namespace std;

int main(){
	
	int noOfNodes, noOfEdges;
	
	cout << "Enter no. of nodes : ";
	cin >> noOfNodes;
	
	cout << "Enter no. of edges : ";
	cin >> noOfEdges;

	int edgeDetails[noOfEdges][3];

	for(int i=0; i<noOfEdges; i++){
		cout << "\nEnter Details of Edge " << i << "\n";
		
		cout << "\t Enter Starting Edge : ";
		cin >> edgeDetails[i][0];

		cout << "\t Enter Destination Edge : ";
		cin >> edgeDetails[i][1];
		
		cout << "\t Enter Distance of travel : ";
		cin >> edgeDetails[i][2];	
	}
	
	int sourceEdge, cost[noOfEdges];	
	for(int i=0; i<noOfEdges; i++){
		cost[i] = 999; 
	}

	cout << "Enter Source Edge : ";
	cin >> sourceEdge;
	cost[sourceEdge] = 0;
	
	for(int i=0; i<noOfNodes-1; i++){
		for(int j=0; j<noOfEdges; j++){
			cost[edgeDetails[j][1]] = min(cost[edgeDetails[j][1]], cost[edgeDetails[j][0]]+edgeDetails[j][2]);
		}
	}
	
	cout<<"\nNode"<<"\tDistance from source";
	for(int j=0;j<noOfNodes;j++){
		cout<<"\n"<<j<<"\t"<<cost[j];
	}
}
