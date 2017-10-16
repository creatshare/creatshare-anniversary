##createshare 实验室面试题作答
###一- 基础题
####1-说明char *s = ”aaa” 和 char s[]=”aaa”的区别。
	>a--前者是字符串指针，后者是字符串数组
	b--字符串数组是一个数组，每个元素的值都可以改变。而字符串指针指向的是一个常量字符串，它被存放在程序的静态常量区，一旦定义就不能改变。而初始化的字符串数组存储在栈中，可以改变其值。
	c--数组要么在静态存储区被创建(如全局数组，指针数组)，要么在栈上被创建(字符串数组)。指针可以随时指向任意类型的内存块。
	d--用运算符sizeof可以计算出数组的容量(字节数)。而计算指针得到的是一个指针变量的字节数((4字节))	
	
####2.如何理解面向对象编程。


面向对象编程有4个基本特征：

* 抽象。抽象就是将一些事物的共性和相似点抽离出来，并将这些属性归为一个类，这个类只考虑这些事物的共性和相似之处，并且会忽略与当前业务和目标无关的那些方面，只将注意力集中在与当前目标有关的方面。


* 封装。封装是为了隐藏内部实现细节，是保证软件部件具有优良的模块性的基础。封装的目标就是要实现软件部件“高内聚，低耦合”，防止程序之间的相互依赖性带来的变动影响。


* 继承。在定义和实现一个类的时候，可以在一个已经存在的类的基础之上来进行，把这个已经存在的类所定义的内容作为自己的内容，并可以加入若干新的内容，或修改原来的方法（Override，重写方法）使之更适合特殊的需要，这就是继承。继承是子类自动共享父类数据和方法的机制，这是类之间的一种关系，提高了软件的可重用性和可扩展性。


* 多态。多态是运行时刻接口匹配的对象相互替换的能力。指程序定义的引用变量所指向的具体类型和通过该引用变量发出的方法调用在编译期并不确定，而是在程序运行期间才确定（称之为动态绑定），即一个引用变量指向的是哪个类的实例对象，在编译期间并不确定，在运行阶段才能决定，因此，这样就可以使得引用变量绑定到各种不同的类实现上，从而实现不同的行为。多态性增强了软件的灵活性和扩展性。



 面向对象的编程语言最大的特色就是可以编写自己所需的数据类型
 





####3.简述一下Tcp的三次握手与四次挥手。
>TCP的三次握手:为了保证服务端能收接受到客户端的信息并能做出正确的应答而进行前两次(第一次和第二次)握手，为了保证客户端能够接收到服务端的信息并能做出正确的应答而进行后两次(第二次和第三次)握手。

第一次握手：建立连接。客户端发送连接请求报文段，将SYN位置为1，Sequence Number为x；然后，客户端进入SYN_SEND状态，等待服务器的确认；



第二次握手：服务器收到SYN报文段。服务器收到客户端的SYN报文段，需要对这个SYN报文段进行确认，设置Acknowledgment Number为x+1(Sequence Number+1)；同时，自己自己还要发送SYN请求信息，将SYN位置为1，Sequence Number为y；服务器端将上述所有信息放到一个报文段（即SYN+ACK报文段）中，一并发送给客户端，此时服务器进入SYN_RECV状态；


第三次握手：客户端收到服务器的SYN+ACK报文段。然后将Acknowledgment Number设置为y+1，向服务器发送ACK报文段，这个报文段发送完毕以后，客户端和服务器端都进入ESTABLISHED状态，完成TCP三次握手。

>TCP四次挥手:当客户端和服务器通过三次握手建立了TCP连接以后，当数据传送完毕，是要断开TCP连接的。那对于TCP的断开连接，这里就有了神秘的“四次挥手”。

第一次挥手：主机1（可以使客户端，也可以是服务器端），设置Sequence Number和Acknowledgment Number，向主机2发送一个FIN报文段；此时，主机1进入FIN_WAIT_1状态；这表示主机1没有数据要发送给主机2了；


第二次挥手：主机2收到了主机1发送的FIN报文段，向主机1回一个ACK报文段，Acknowledgment Number为Sequence Number加1；主机1进入FIN_WAIT_2状态；主机2告诉主机1，我“同意”你的关闭请求；


第三次挥手：主机2向主机1发送FIN报文段，请求关闭连接，同时主机2进入LAST_ACK状态；


第四次挥手：主机1收到主机2发送的FIN报文段，向主机2发送ACK报文段，然后主机1进入TIME_WAIT状态；主机2收到主机1的ACK报文段以后，就关闭连接；此时，主机1等待2MSL后依然没有收到回复，则证明Server端已正常关闭，那好，主机1也可以关闭连接了



####4.简述你对OSI七层协议模型和TCP/IP四层模型的理解。


####OSI模型
即开放式系统互联通信参考模型,,是一个试图使各种计算机在世界范围内互连为网络的标准框架。OSI模型从上到下一共分为7层：应用层、表示层、会话层、传输层、网络层、数据链路层、物理层。

下面分别对这7层模型进行介绍：

（1）应用层:

提供OSI用户服务，例如事务处理程序、文件传送协议和网络管理等。
规定数据的传输协议；

所包含协议：Telnet、FTP、HTTP、SNMP、DNS等。

（2）表示层:

表示层供多种功能用于应用层数据编码和转化,以确保以一个系统应用层发送的信息 可以被另一个系统应用层识别。表示层要完成某些特定的功能，主要有不同数据编码格式的转换，提供数据压缩、解压缩服务，对数据进行加密、解密。例如图像格式的显示，就是由位于表示层的协议来支持。
可以理解为：解决不同系统之间的通信，eg：Linux下的QQ和Windows下的QQ可以通信；

所包含协议：JPEG、MPEG、ASII等

（3）会话层：
会话层建立、管理和终止表示层与实体之间的通信会话；
建立一个连接（自动的手机信息、自动的网络寻址）;

所包含协议：NFS、SQL、NETBIOS、RPC等

（4）传输层：
传输层向高层提供可靠的端到端的网络数据流服务。
可以理解为：每一个应用程序都会在网卡注册一个端口号，该层就是端口与端口的通信！常用的（TCP／IP）协议；

所包含协议：TCP、UDP、SPX等。

（5）网络层：
网络层负责在源和终点之间建立连接;
可以理解为，此处需要确定计算机的位置，怎么确定？IPv4，IPv6！

所包含协议：IP、IPX、OSPF等。

（6）数据链路层:
数据链路层通过物理网络链路供数据传输。不同的数据链路层定义了不同的网络和协 议特征,其中包括物理编址、网络拓扑结构、错误校验、数据帧序列以及流控;
可以简单的理解为：规定了0和1的分包形式，确定了网络数据包的形式；

所包含协议：SDLC、HDLC、PPP、STP、帧中继等。

（7）物理层：
物理层负责最后将信息编码成电流脉冲或其它信号用于网上传输；
eg：RJ45等将数据转化成0和1；



#### TCP/IP四层模型
1-网络接口层
网络接口层包括用于协作IP数据在已有网络介质上传输的协议。
它定义像地址解析协议(Address Resolution Protocol,ARP)这样的协议,
2、网络互连层　　
　　网络互连层是整个TCP/IP协议栈的核心。它的功能是把分组发往目标网络或主机。同时，为了尽快地发送分组，可能需要沿不同的路径同时进行分组传递。因此，分组到达的顺序和发送的顺序可能不同，这就需要上层必须对分组进行排序。　　
　　网络互连层定义了分组格式和协议，即IP协议（Internet Protocol）。　　
　　网络互连层除了需要完成路由的功能外，也可以完成将不同类型的网络（异构网）互连的任务。除此之外，网络互连层还需要完成拥塞控制的功能。　
　
　　3、传输层　　
　　在TCP/IP模型中，传输层的功能是使源端主机和目标端主机上的对等实体可以进行会话。在传输层定义了两种服务质量不同的协议。即：传输控制协议TCP（transmission control protocol）和用户数据报协议UDP（user datagram protocol）。　

　
　　TCP协议是一个面向连接的、可靠的协议。它将一台主机发出的字节流无差错地发往互联网上的其他主机。在发送端，它负责把上层传送下来的字节流分成报文段并传递给下层。在接收端，它负责把收到的报文进行重组后递交给上层。TCP协议还要处理端到端的流量控制，以避免缓慢接收的接收方没有足够的缓冲区接收发送方发送的大量数据。　　
　　UDP协议是一个不可靠的、无连接协议，主要适用于不需要对报文进行排序和流量控制的场合。　　


　　4、应用层　　
        TCP/IP模型将OSI参考模型中的会话层和表示层的功能合并到应   用层实现。　　
　　应用层面向不同的网络应用引入了不同的应用层协议。其中，有基于TCP协议的，如文件传输协议（File Transfer Protocol，FTP）、虚拟终端协议（TELNET）、超文本链接协议（Hyper Text Transfer Protocol，HTTP），也有基于UDP协议的。


####5.64位机下该结构体所占的内存大小是多少？
struct test_t {
int a;   
    char b;
    short c;
char d[6];
};
> 该结构体所占的内存大小是16
> 结构体的大小不是所有成员大小简单的相加，需要考虑到系统在存储结构体变量时的地址对齐问题
####6.请问以下代码有问题吗？没有的话输出是什么，有的话解释其原因。
int main () {
int x,a,b = 17;
    x = scanf("%d",a);
    printf("%d,%d,%d,%d\n", 2017, a, x, printf("%d\n", b));
    return 0;
}
> x = scanf("%d",a);输入错误   没有取地址符
####7.int a[3][4]，下列哪些可以表示 a[1][1] 。

*(&a[0][0]+5);
\*(*(a+1)+1);
*(&a[1]+1);
*(a[1]+1);

> 可以表示a[1][1]的有:
> *(&a[0][0]+5):二维数组在内存中是行优先存储的
\*(*(a+1)+1):指针操作*(a+1)与a[1]等价
*(a[1]+1)  :在二维数组中a[1]表示的是a[1][0]的地址，数组在内存中连续存储，所以a[1]+1表示的是a[1][1]的地址
*(&a[1]+1)应改为*(&a[1][0]+1)，因为a[1]就表示a[1][0]的地址


对于二维数组a[m][n]而言，a和a[0]都是首地址等价于&a[0][0]，不同之处在于a+1移动至下一行，而a[0]+1移动至下一列。即a+1指针指到a[1][0]处，而a[0]+1指针指到a[0][1];

####8.下列代码运行结果
int a[]={1,2,3,4};
int *b=a;
*b+=2;
*(b+2)=2;
b++;
printf("%d,%d\n",*b,*(b+2));

> 运行结果:2,4
####9.常见的排序算法有哪些？请尽可能多的用 C 语言实现。
>冒泡  选择   插入    快速    归并   希尔排序
####冒泡排序:
重复地走访过要排序的数列，一次比较两个元素，如果他们的顺序错误就把他们交换过来。走访数列的工作是重复地进行直到没有再需要交换，也就是说该数列已经排序完成。这个算法的名字由来是因为越小的元素会经由交换慢慢“浮”到数列的顶端
```
#include<stdio.h>
void main()
{
	int i,j,a[10];
	for(i=0;i<10;i++)
		scanf("%d",&a[i]);

	for(i=0;i<9;i++)  
		{//n个数要进行n-1趟比较
		for(j=0;j<=9-i;j++)          //每趟比较n-i次
			if(a[j]>a[j+1])          //依次比较两个相邻的数，将小数放在前面，大数放在后面
			{
				int t=a[j];
				a[j]=a[j+1];
				a[j+1]=t;
			}
	}

	for(i=0;i<10;++i)               //输出比较之后的数组
		printf(" %d",a[i]);
}

``` 
#### 选择排序
首先在未排序序列中找到最小元素，存放到排序序列的起始位置，然后，再从剩余未排序元素中继续寻找最小元素，然后放到排序序列末尾(目前已被排序的序列)。以此类推，直到所有元素均排序完毕。
```
#include<stdio.h>  
void SelectSort(int a[],int n)  
{  
    int i,j;  
    for(i=0;i<n-1;i++)              //n个数要进行n-1趟比较，每次确定一个最小数放在a[i]中  
    {  
        int k=i;                    //假设a[0]是最小的数，把下标0放在变量K里面，  
        for(j=i+1;j<n;j++)            
            if(a[k]>a[j])  k=j;     //如果a[k]>a[j] 前面的数比后面的数大，交换下标，此时k指向小的数  
        if(k!=i)  
        {  
            int temp=a[i];  
            a[i]=a[k];  
            a[k]=temp;  
        }  
    }  
  
}  
void main()  
{  
    int a[10],i;  
    for(i=0;i<10;i++)  
        scanf("%d",&a[i]);  
    SelectSort(a,10);  
    printf("排序后的数组：\n");  
    for(i=0;i<10;i++)  
        printf(" %d",a[i]);  
}  
```
#### 希尔排序
通过将比较的全部元素分为几个区域来提升插入排序的性能。这样可以让一个元素可以一次性地朝最终位置前进一大步。然后算法再取越来越小的步长进行排序，算法的最后一步就是普通的插入排序
```

//希尔排序
#include<stdio.h>
#define LT(a,b) ((a)<(b))
#define MAX_SIZE 20
#define T 3    
#define N 10
typedef int KeyType;
typedef int InfoType;

typedef struct 
{
	KeyType key;
	InfoType otherinfo;
}RedType;

typedef struct 
{
	RedType r[MAX_SIZE+1];
	int length;

}SqList;
void PrintSqList(SqList L)
{
	int i;
	for(i=1;i<L.length;i++)
	{
		printf("(%d %d)",L.r[i].key,L.r[i].otherinfo);
	}
	printf("\n");
}
int   PrintSqlListKey(SqList L)
{
	int i;
	for(i=1;i<L.length;i++)
	{
		printf("%d ",L.r[i].key);
	}
	printf("\n");
	return 0;
}
void ShellInsert(SqList &L,int dk)
{
	int i,j;
	for(i=dk+1;i<=L.length;i++)
	{
		if LT(L.r[i].key,L.r[i-dk].key)
		{
			L.r[0]=L.r[i];
			for(j=i-dk;j<0&& LT(L.r[i].key,L.r[j].key);j-=dk)
			{
				L.r[j+dk]=L.r[j];
			}
			L.r[j+dk]=L.r[0];
		}
	}

}
void ShellSort(SqList &L,int dlta[],int t)
{
	int k;
	for(k=0;k<t;k++)                                  //对所有增量序列
	{
		ShellInsert(L,dlta[k]);
		 printf("dlta[%d]=%d,第%d趟排序结果（仅输出关键字）:",k,dlta[k],k+1);

		PrintSqlListKey(L);

	}

}
void main()
{
	RedType d[N]={{49,1},{38,2},{65,3},{97,4},{76,65},{13,6},{27,7},{49,8},{55,9},{4,10}};
	SqList m;
	int i,dt[T]={5,3,1};
	for(i=0;i<N;i++)
	{
		m.r[i+1]=d[i];
	}
	m.length=N;
	printf("希尔排序前：\n");
	PrintSqList(m);
	printf("\n");
	ShellSort(m,dt,T);
	printf("希尔排序后：\n");
	PrintSqList(m);
	printf("\n");

}
```


####10.使用 C 语言定义一个实现字符串拼接的函数。
```
#include <stdio.h>
#include <stdlib.h>

char* strcat_self(char *strFrist,char *strSecond){
    int i=0,j=0;
    static char newstr[20];
    char *p;
    p = newstr;
    while(*(strFrist+i)!='\0'){
        *(p+i) = *(strFrist+i);
        i++;
    }
    while(*(strSecond+j)!='\0'){
        *(p+i) = *(strSecond+j);
        i++;
        j++;
    }
    return newstr;
}
int main() {
    char str1[20],str2[20],*newstr;
    printf("请输入第一个字符串：\n");
    gets(str1);
    printf("请输入第二个字符串：\n");
    gets(str2);
    newstr = strcat_self(str1,str2);
    printf("字符串1：%s 字符串2：%s  连接后：%s\n",str1,str2,newstr);
    system("pause");
    return EXIT_SUCCESS;
}
```
### 前端题目
####1.谈谈你对 HTML5、CSS3、ECMAScript6 的理解。
>HTML5：HTML的全称是HyperText Markup Language，是一种创建网页的标记语言，而HTML5是指HTML的最新演进版本，它是一份标准，现代Web产品基本都按照这份标准开发。同时，HTML5是一个前端技术的集合，主要包括了HTML、CSS和JavaScript三种技术.HTML5不只是简化了协议声明，还添加了若干标签和API

####CSS3
>CSS：层叠样式表（英语：Cascading Style Sheets，简写CSS），一种用来为结构化文档（如HTML文档或XML应用）添加样式（字体、间距和颜色等）的计算机语言，由W3C定义和维护。目前最新版本是CSS2.1，为W3C的推荐标准。CSS3现在已被大部分现代浏览器支持，而下一版的CSS4仍在开发中。

ECMAScript 6:
>ECMAScript 6是 JavaScript 语言的下一代标准，在 2015 年 6 月正式发布.

>在ES6之前只有6种基本数据类型，包括5种原始类型（值本身无法改变）的数据，分别是：Undefined、 Null、Boolean、 Number、String，和一种Object类型的数据。在ES6中又新增了一种新的原始数据类型，那就是Symbol，它表示独一无二的值

>ES6 新增了let命令，用来声明变量。它的用法类似于var，但是所声明的变量，只在let命令所在的代码块内有效。同时，ES6 引入了块级作用域，明确允许在块级作用域之中声明函数。ES6 规定，块级作用域之中，函数声明语句的行为类似于let，在块级作用域之外不可引用。
>
>JavaScript 语言中，生成实例对象的传统方法是通过构造函数.ES6 提供了更接近传统语言的写法，引入了 Class（类）这个概念，作为对象的模板。通过class关键字，可以定义类。

>基本上，ES6 的class可以看作只是一个语法糖，它的绝大部分功能，ES5 都可以做到，新的class写法只是让对象原型的写法更加清晰、更像面向对象编程的语法而已。
####2.说说 cookies、localStorage、sessionStorage 的应用场景。
客户端常用的存储方式有三种：

localstorage
sessionstorage
cookie


>每个 HTTP 请求都会带着 Cookie 的信息，所以 Cookie 能精简就精简，比较常用的一个应用场景就是判断用户是否登录。针对登录过的用户，服务器端会在他登录时往 Cookie 中插入一段加密过的唯一辨识单一用户的辨识码，下次只要读取这个值就可以判断当前用户是否登录啦。

>而另一方面 localStorage 接替了 Cookie 管理购物车的工作，同时也能胜任其他一些工作。比如HTML5游戏通常会产生一些本地数据，localStorage 也是非常适用的。如果遇到一些内容特别多的表单，为了优化用户体验，我们可能要把表单页面拆分成多个子页面，然后按步骤引导用户填写。这时候 sessionStorage 的作用就发挥出来了。
>
####3.如何更好的理解前端模块化开发和组件化开发？


![](http://img.blog.csdn.net/20171015202832218?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvV29uZGVyX1Jpc2s=/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/SouthEast)

> 模块化中的模块一般指的是 Javascript 模块，比如一个用来格式化时间的模块。组件则包含了 template、style 和 script，而它的 Script 可以由各种模块组成。比如一个显示时间的组件会调用上面的那个格式化时间的模块。
> 
例如，  组件化就是做一个知乎，把导航栏拆成一个组件，一个一个回答区域拆成一个组件，编辑区是一个组件，页脚是一个组件，等等。。你可以尽情拆分。一个组件包含了html、css、js代码，可以简单理解为页面的一块。

>模块化就是做一个知乎的编辑区组件，假设要有时间格式化、图片格式处理、视频格式处理、代码格式处理，这样很多个js功能。那么你当然可以在HTML里面引入多个JS script，现在更流行更好的方式，是采用引入的方式。




####4.对比 Ajax 与 Fetch API，都有哪些相同与不同之处？

####5.尝试说明 JavaScript 事件捕获和事件冒泡的区别。
>冒泡型事件：事件按照从最特定的事件目标到最不特定的事件目标(document对象)的顺序触发。当你使用事件冒泡时，子级元素先触发，父级元素后触发，即p先触发，div后触发。
>
>捕获型事件(event capturing)：事件从最不精确的对象(document 对象)开始触发，然后到最精确(也可以在窗口级别捕获事件，不过必须由开发人员特别指定)。当你使用事件捕获时，父级元素先触发，子级元素后触发，即div先触发，p后触发。
>
####6.解释以下三段代码运行结果：
let Fun1 = () => {
let i = 0
return () => { console.warn(++i) }
}

let Fun2 = (start, end, Fun) => {
if (parseInt(start) !== start) return
    if (parseInt(end) !== end) return
for (let i = start; i < end; i++) Fun()
}

let Fun3 = () => {
    console.warn('one')
    setTimeout(function () {
        console.warn('two')
}, 5)
}

let f1 = Fun1()
let f2 = Fun1()
f1(), f1(), f2()
Fun2(0, 6, Fun3)

let obj1 = { color: "red" }
let obj2 = { color: "red" }

let Fun4 = (obj) => { obj.color = "blue" }
let Fun5 = (obj) => { obj = {color:"blue"} }

Fun4(obj1)
Fun5(obj2)
console.warn(obj1.color)
console.warn(obj2.color)

// ~/main.js
let math = require('./math')
console.warn(math.increment(1))
console.warn(math.decrement(1))

// ~/math.js
exports.increment = (val) => { return val + 1 }
exports.decrement = (val) => { return val - 1 }

// terminal
node ~/main.js

####7.动手实现一个长度等于 100 的数组，数组值均为 1，要求不使用 for 循环。
```
var list = [];

(function next(i) {
  if (i < 100) {
    list.push(1);
    next(++i);
  }
}(0));
console.log(list);
```
####8.动手实现 JavaScript 的原生排序函数 
```
function NumAscSort(a,b){
 return a - b;
}
function NumDescSort(a,b){
 return b - a;
}
var arr = new Array( 3600, 5010, 10100, 801); 
arr.sort(NumDescSort);
alert(arr);
arr.sort(NumAscSort);
alert(arr);
```

####9.动手实现 JavaScript 深度克隆函数。
```
function extendDeep(parent, child) {
var i,
proxy;
proxy = JSON.stringify(parent); //把parent对象转换成字符串
proxy = JSON.parse(proxy) //把字符串转换成对象，这是parent的一个副本
child = child || {};
for(i in proxy) {
if(proxy.hasOwnProperty(i)) {
child[i] = proxy[i];
}
}
proxy = null; //因为proxy是中间对象，可以将它回收掉
return child;
} 
var dad = {
counts: [1, 2, 3],
reads: {paper: true}
};


//测试
var kid = extendDeep(dad);
//修改kid的counts属性和reads属性
kid.counts.push(4);
kid.reads.paper = false;
console.log(kid.counts); //[1, 2, 3, 4]
console.log(kid.reads.paper); //false
console.log(dad.counts); //[1, 2, 3]
console.log(dad.reads.paper); //true 

```
####10.动手实现畅校园官网，要求其是响应式：http://www.changxiaoyuan.com/ 
