# 2017-2 Internet Programming Team Project : Web Compiler
## Collaborator
* 2016920020 서예찬
* 2016920041 이태희
* 2016920060 최형진

## Proposal(2017/11/14) Discussion
* Web Compiler가 아니라 정확히 말하면 Compiler Web Interface.
* 기존 사례들을 조사. 
	* 이들을 모방?
	* 특정 기능 구현? 개선?

## TODO List
1. **1단계 : 세상에서 가장 간단한 웹 컴파일러 만들기**
	1. 코드 입력받을 텍스트 박스와 컴파일 버튼 생성. Code Highlighter 적용.
		* [HTML textarea tag](https://www.w3schools.com/tags/tag_textarea.asp)
		* [HTML Forms](https://www.w3schools.com/html/html_forms.asp)
		* [PHP Form](https://www.w3schools.com/php/php_forms.asp)
		* [CodeMirror](http://codemirror.net/index.html)
	2. PHP에서 쉘 코드(C언어 컴파일 코드) 실행
		* [How to compile & execute C program on Linux](http://www.codecoffee.com/tipsforlinux/articles/18.html)
	3. 컴파일 및 실행 결과를 출력
		* [PHP: 실행 연산자](http://php.net/manual/kr/language.operators.execution.php)
		* [PHP: shell_exec](http://php.net/manual/kr/function.shell-exec.php)
		
2. **2단계 : 표준입출력**
	1. stdin 받을 텍스트 박스와 stdout 뱉을 텍스트 박스 생성
		* [HTML textarea tag](https://www.w3schools.com/tags/tag_textarea.asp)
3. **3단계 : Sandboxing**
	1. Sandboxing using Docker
4. **4단계 : From Web Compiler to Web IDE** (**시간 나면 하자**)
	1. 계정 기능
	2. 디버깅 기능
	3. VM 콘솔 기능

## Reference
* [How to build an web compiler](http://hashcode.co.kr/questions/3530/%EC%9B%B9-%EC%BB%B4%ED%8C%8C%EC%9D%BC%EB%9F%AC-%EB%A7%8C%EB%93%A4%EA%B8%B0)
* [HTML textarea tag](https://www.w3schools.com/tags/tag_textarea.asp)
* [HTML Forms](https://www.w3schools.com/html/html_forms.asp)
* [PHP Form](https://www.w3schools.com/php/php_forms.asp)
* [How to compile & execute C program on Linux](http://www.codecoffee.com/tipsforlinux/articles/18.html)
* [PHP: 실행 연산자](http://php.net/manual/kr/language.operators.execution.php)
* [PHP: shell_exec](http://php.net/manual/kr/function.shell-exec.php)
* 악의적인 코드를 막기 위한 Sandboxing => [Easy deploy with Docker](http://blog.nacyot.com/articles/2014-01-27-easy-deploy-with-docker/)
* 코드를 예쁘게 보여주는 Code Highlighter => [CodeMirror](http://codemirror.net/index.html)

## License
MIT License
