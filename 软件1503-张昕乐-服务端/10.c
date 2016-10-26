#include<stdio.h>
int findm(int n,int m)
{
	int i,x,k,t,l,y,j;
	int a[n];
	for(i=0;i<n;i++)
		a[i]=i+1;
	for(i=0;i<n;i++){
		if(a[i]<10){
	   	continue;
		}
	   else if(a[i]>=10){
	   	t=a[i];
	   	x=a[i]/10;
	   	y=a[i]%10;
			for(j=0;j<=i;j++)
			{	
				if(x==a[j]){
					while(1){
						if(a[j+1]<10)
							break;
						j++;
					}
					k=j+1;
					break;
				}		
			}
			for(l=i;l>k;l--)
			{
				a[l]=a[l-1];
			}
			a[k]=t;
		}

	}	
	/*for(i=0;i<n;i++)
		printf("%d ",a[i]);*/
	return a[m-1];
}
int main()
{
 	int i,x,m,n;
	scanf("%d%d",&n,&m);	
	x=findm(n,m);
	printf("\n%d",x);
}
