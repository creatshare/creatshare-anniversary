# 技术类

* 加分：将笔试题答案提交到 github 上对下方仓库链接进行 Pull Request：

> https://github.com/creatshare-demos/CreatShare-5th-Anniversary.git

# 基础部分

1. 尝试说明 ```char *s = ”aaa”``` 和 ```char s[]=”aaa”```的区别。
2. 如何理解面向对象编程。
3. 简述一下Tcp的三次握手与四次挥手。
4. 简述你对OSI七层协议模型和TCP/IP四层模型的理解。
5. 64位机下该结构体所占的内存大小是多少？

```
struct test_t {
    int a; 
    char b;
    short c;
    char d[6];
};
```

6. 请问以下代码有问题吗？没有的话输出是什么，有的话解释其原因。

```
int main () {
    int x,a,b = 17;
    x = scanf("%d",a);
    printf("%d,%d,%d,%d\n", 2017, a, x, printf("%d\n", b));
    return 0;
}
```

7. 下列哪些可以表示 a[1][1] 。

```
*(&a[0][0]+5)
*(*(a+1)+1)
*(&a[1]+1)
*(a[1]+1)
```

8. 下列代码运行结果

```
int a[]={1,2,3,4};
int *b=a;
*b+=2;
*(b+2)=2;
b++;
printf("%d,%d\n",*b,*(b+2));
```

9. 常见的排序算法有哪些？请尽可能多的用 C 语言实现。
10. 使用 C 语言定义一个实现字符串拼接的函数。

# 前端部分

1. 谈谈你对 HTML5、CSS3、ECMAScript6 的理解。
2. 说说 cookies、localStorage、sessionStorage 的应用场景。
3. 如何更好的理解前端模块化开发和组件化开发？
4. 对比 Ajax 与 Fetch API，都有哪些相同与不同之处？
5. 尝试说明 JavaScript 事件捕获和事件冒泡的区别。
6. 解释以下代码运行结果：

```
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
```

```
let obj1 = { color: "red" }
let obj2 = { color: "red" }

let Fun4 = (obj) => { obj.color = "blue" }
let Fun5 = (obj) => { obj = {color:"blue"} }

Fun4(obj1)
Fun5(obj2)
console.warn(obj1.color)
console.warn(obj2.color)
```

```
// ~/main.js
let math = require('./math')
console.warn(math.increment(1))
console.warn(math.decrement(1))

// ~/math.js
exports.increment = (val) => { return val + 1 }
exports.decrement = (val) => { return val - 1 }

// terminal
node ~/main.js
```

7. 动手实现一个长度等于 100 的数组，数组值均为 1，要求不使用 for 循环。
8. 动手实现 JavaScript 的原生排序函数 Array.prototype.sort() 。
9. 动手实现 JavaScript 深度克隆函数。
10. 动手实现畅校园官网，要求其是响应式：http://www.changxiaoyuan.com/ 。

# 服务端部分

1. 如何防止表单重提交。
2. 简述一下你对Linux文件权限的理解。
3. 简述一下进程和线程的区别。
4. 如何用linux 终端连接一个远程服务器，并上传文件。
5. 谈谈你对对象关系型映射（orm）的理解。
6. 请求转发和重定向的区别。
7. 谈谈你对MVC模式的理解。
8. 简述一下关系型数据库和非关系型数据库的区别。
9. 请手写出简单的 SQL CURD 操作命令。
10. 搭建开发环境，用 POST 方法向后台发送JSON 数据，如果是以下内容则返回”Welcome Creatshare 2017”;否则返回”error”;

```
{
    Request: ”creatshare”,
    Year：”2017”
}
```

# 产品类

请于下列五道题中选择四道题回答：

1. 你为什么选择产品经理岗位，你认为一个好的产品经理应该具备哪些素质。
2. 你认为目前畅校园微信公众平台与微畅校园小程序仍缺乏哪些未能满足你的功能。
3. 列举一款你常用的移动APP（除微信，QQ，微博，淘宝），并分析他的核心功能，超出你预期的地方以及其发展趋势。
4. 你认为在2017年每天下午四点有多少人在使用微信朋友圈功能，请结合相关数据进行分析。
5. 请给以下人物各推荐一款APP并解释原因，其分别是你的父亲，母亲与异性朋友。

# 运营类

请于下列五道题中选择四道题回答：

1. 你认为运营师什么？
2. 如何向盲人描述或？
3. 现阶段直播平台非常火热，假设你是直播平台的一名人员，你会举办什么活动进行拉新促活？
4. 如何看待人民日报批判王者荣耀事件？
5. 如何看待薛之谦与李雨桐事件？

# 视觉类

## 基础题

1. 印刷物和电子屏幕的颜色模式有什么区别？显示原理是什么？
2. 三大构成是什么？
3. 排版有什么原则（方法）？（至少举出三个）
4. 列出一种配色方法，并用你的话说明。
5. 你眼中的设计是什么样的？谈谈你对设计的认识。
5. 你是否是已经在学设计？是则简述你的学习设计的经历，否则简述你打算如何学习设计。

## 加分题

1. 简述设计与艺术之间的关系。
2. 梳理互联网行业中 UX 工作种类。
3. 简述视觉设计师、交互设计师、UI 设计师的联系与区别。

1. 简述设计与艺术之间的关系。
2. 梳理互联网行业中 UX 工作种类。
3. 简述视觉设计师、交互设计师、UI 设计师的联系与区别。