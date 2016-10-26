#include<stdio.h>
int main(){
	unsigned int a=0x12345678;
	unsigned char *p=(unsigned char *)(&a);
	printf("%s\n",(0x78==*(p+0))?"1":"3");

}
