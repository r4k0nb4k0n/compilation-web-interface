#include <stdio.h>
#define MAX 20

int main(){
	char name[MAX];
    int age;
	printf("Input your name: ");
    scanf("%s", name);
    printf("Input your age: ");
    scanf("%d", &age);
    printf("\n\n");
    printf("%s\n%d\n", name, age);
   	return 0;
}