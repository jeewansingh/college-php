#include <stdio.h>
#include <conio.h>

typedef struct{
	int pid;
	int burst;
}process;

void calculateTime(process p[], int n, int waiting[], int turnaround[]){
	int i;
	waiting[0]=0;
	for(i=0;i<n;i++){
		waiting[i]= waiting[i-1] + p[i-1].burst;
		for(i=0;i<n;i++){
			turnaround[i] = waiting[i]+ p[i].burst;
		}
	}
}

void calculateAvg(process p[], int n){
	int i;
	int waiting[n], turnaround[n];
	int totalwaiting = 0 , totalturnaround = 0;
	calculateTime(p,n,waiting,turnaround);
	printf("Process \t burst time \t waiting\t turnaround time \n");
	for(i=0;i<n;i++){
		totalwaiting += waiting[i];
		totalturnaround += turnaround[i];
		printf("%d\t\t %d\t\t %d\t\t %d\n", p[i].pid, p[i].burst, waiting[i], turnaround[i]);
		
	}
	double averagewaiting = (double)totalwaiting/n;
	double averageturnaround = (double)totalturnaround/n;
	printf("\n Average Waiting Time:: %f", averagewaiting);
		printf("\n Average turnaround Time:: %f", averageturnaround);
	
}

int main(){
	int i, n;
	printf("Enter the number of preocess:");
	scanf("%d", &n);
	process p[n];
	printf("Enter the burst time");
	for(i=0;i<n;i++){
		printf("process %d:\n", i+1);
		p[i].pid = i+1;
		printf("Burst time");
		scanf("%d", &p[i].burst);
		calculateAvg(p,n);
		getch();
	}
	return 0;	}