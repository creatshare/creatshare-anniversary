# 常见的三种 CSS 预处理器

标签（空格分隔）： css

---

定义：

CSS 预处理器定义了一种新的语言，其基本思想是，用一种专门的编程语言，为 CSS 增加了一些编程的特性，将 CSS 作为目标生成文件，然后开发者就只要使用这种语言进行编码工作。

三种 CSS 预处理器框架，分别是 Sass、Less CSS、Stylus。

语法：

Sass 和 Less 都使用的是标准的 CSS 语法，可以很方便的将已有的 CSS 代码转为预处理器代码，默认 Sass 使用 .sass 扩展名，而 Less 使用 .less 扩展名。

变量

可以在 CSS 预处理器中声明变量，并在整个样式单中使用，支持任何类型的变量，例如颜色、数值（不管是否包括单位）、文本。然后你可以任意引用该变量。

Sass 的变量必须是 $ 开始，然后变量名和值使用冒号隔开，跟 CSS 的属性一致：

```
$mainColor: #0982c1;
$siteWidth: 1024px;
$borderStyle: dotted;

body {
  color: $mainColor;
  border: 1px $borderStyle $mainColor;
  max-width: $siteWidth;
}
```

而 Less 的变量名使用 @ 符号开始：

```
@mainColor: #0982c1;
@siteWidth: 1024px;
@borderStyle: dotted;

body {
  color: @mainColor;
  border: 1px @borderStyle @mainColor;
  max-width: @siteWidth;
}
```
Stylus 对变量名没有任何限定，你可以是 $ 开始，也可以是任意的字符，而且与变量值之间可以用冒号、空格隔开，需要注意的是 Stylus (0.22.4) 将会编译 @ 开始的变量，但其对应的值并不会赋予该变量，换句话说，在 Stylus 的变量名不要用 @ 开头。

```
mainColor = #0982c1
siteWidth = 1024px
$borderStyle = dotted

body
  color mainColor
  border 1px $borderStyle mainColor
  max-width siteWidth
```

上面的三种不同的 CSS 预处理器的写法，最终都将产生相同的结果：

```
body {
  color: #0982c1;
  border: 1px dotted #0982c1;
  max-width: 1024px;
}
```

你可以想象，加入你的 CSS 中使用了某个颜色的地方多达数十次，那么要修改颜色时你必须找到这数十次的地方并一一修改，而有了 CSS 预处理器，修改一个地方就够了！

嵌套

如果我们需要在CSS中相同的 parent 引用多个元素，这将是非常乏味的，你需要一遍又一遍地写 parent。例如:
```
section {
  margin: 10px;
}
section nav {
  height: 25px;
}
section nav a {
  color: #0982C1;
}
section nav a:hover {
  text-decoration: underline;
}
```

而如果用 CSS 预处理器，就可以少些很多单词，而且父子节点关系一目了然。我们这里提到的三个 CSS 框架都是允许嵌套语法:

```
section {
  margin: 10px;

  nav {
    height: 25px;

    a {
      color: #0982C1;

      &amp;:hover {
        text-decoration: underline;
      }
    }
  }
}
```

最终生成的 CSS 结果和第一遍写的一样。

Mixins (混入)

Mixins 有点像是函数或者是宏，当你某段 CSS 经常需要在多个元素中使用时，你可以为这些共用的 CSS 定义一个 Mixin，然后你只需要在需要引用这些 CSS 地方调用该 Mixin 即可。

Sass 的混入语法:

```
/* Sass mixin error with (optional) argument $borderWidth which defaults to 2px if not specified */
@mixin error($borderWidth: 2px) {
  border: $borderWidth solid #F00;
  color: #F00;
}

.generic-error {
  padding: 20px;
  margin: 4px;
  @ include error(); /* Applies styles from mixin error */
}
.login-error {
  left: 12px;
  position: absolute;
  top: 20px;
  @ include error(5px); /* Applies styles from mixin error with argument $borderWidth equal to 5px*/
}
```
Less CSS 的混入语法：
```
/* LESS mixin error with (optional) argument @borderWidth which defaults to 2px if not specified */
.error(@borderWidth: 2px) {
  border: @borderWidth solid #F00;
  color: #F00;
}

.generic-error {
  padding: 20px;
  margin: 4px;
  .error(); /* Applies styles from mixin error */
}
.login-error {
  left: 12px;
  position: absolute;
  top: 20px;
  .error(5px); /* Applies styles from mixin error with argument @borderWidth equal to 5px */
}
```
Stylus 的混入语法:

```
/* Stylus mixin error with (optional) argument borderWidth which defaults to 2px if not specified */
error(borderWidth= 2px) {
  border: borderWidth solid #F00;
  color: #F00;
}

.generic-error {
  padding: 20px;
  margin: 4px;
  error(); /* Applies styles from mixin error */
}
.login-error {
  left: 12px;
  position: absolute;
  top: 20px;
  error(5px); /* Applies styles from mixin error with argument borderWidth equal to 5px */
}
```

最终它们都将编译成如下的 CSS 样式：
```
.generic-error {
  padding: 20px;
  margin: 4px;
  border: 2px solid #f00;
  color: #f00;
}
.login-error {
  left: 12px;
  position: absolute;
  top: 20px;
  border: 5px solid #f00;
  color: #f00;
}
```

继承

当我们需要为多个元素定义相同样式的时候，我们可以考虑使用继承的做法。例如我们经常需要：
```
p,
ul,
ol {
  /* styles here */
}
```
在 Sass 和 Stylus 我们可以这样写：
```
.block {
  margin: 10px 5px;
  padding: 2px;
}

p {
  @extend .block; /* Inherit styles from '.block' */
  border: 1px solid #EEE;
}
ul, ol {
  @extend .block; /* Inherit styles from '.block' */
  color: #333;
  text-transform: uppercase;
}
```
在这里首先定义 .block 块，然后让 p 、ul 和 ol 元素继承 .block ，最终生成的 CSS 如下:
```
.block, p, ul, ol {
  margin: 10px 5px;
  padding: 2px;
}
p {
  border: 1px solid #EEE;
}
ul, ol {
  color: #333;
  text-transform: uppercase;
}
```
在这方面 Less 表现的稍微弱一些，更像是混入写法：
```
.block {
  margin: 10px 5px;
  padding: 2px;
}

p {
  .block; /* Inherit styles from '.block' */
  border: 1px solid #EEE;
}
ul, ol {
  .block; /* Inherit styles from '.block' */
  color: #333;
  text-transform: uppercase;
}
```
生成的 CSS 如下：
```
.block {
  margin: 10px 5px;
  padding: 2px;
}
p {
  margin: 10px 5px;
  padding: 2px;
  border: 1px solid #EEE;
}
ul,
ol {
  margin: 10px 5px;
  padding: 2px;
  color: #333;
  text-transform: uppercase;
}
```

你所看到的上面的代码中，.block 的样式将会被插入到相应的你想要继承的选择器中，但需要注意的是优先级的问题。

导入 (Import)

很多 CSS 开发者对导入的做法都不太感冒，因为它需要多次的 HTTP 请求。但是在 CSS 预处理器中的导入操作则不同，它只是在语义上包含了不同的文件，但最终结果是一个单一的 CSS 文件，如果你是通过 @ import "file.css"; 导入 CSS 文件，那效果跟普通的 CSS 导入一样。注意：导入文件中定义的混入、变量等信息也将会被引入到主样式文件中，因此需要避免它们互相冲突。

reset.css:
```
/* file.{type} */
body {
  background: #EEE;
}
```
main.xxx:
```
@ import "reset.css";
@ import "file.{type}";

p {
  background: #0982C1;
}
```
最终生成的 CSS：

```
@ import "reset.css";
body {
  background: #EEE;
}
p {
  background: #0982C1;
}
```
颜色函数

CSS 预处理器一般都会内置一些颜色处理函数用来对颜色值进行处理，例如加亮、变暗、颜色梯度等。

运算符

你可以直接在 CSS 预处理器中进行样式的计算，例如：
```
body {
  margin: (14px/2);
  top: 50px + 100px;
  right: 100px - 50px;
  left: 10 * 10;
}
```

参考资料： https://www.oschina.net/question/12_44255







