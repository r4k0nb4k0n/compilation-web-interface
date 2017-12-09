# 2017-2 Internet Programming Team Project : Web Compiler
## Collaborator
* 2016920020 서예찬
* 2016920041 이태희
* 2016920060 최형진

## Proposal(2017/11/14) Discussion
* Web Compiler가 아니라 정확히 말하면 Compiler Web Interface.
	- 프로젝트명 Compilation Web Interface으로 수정
* 기존 사례들을 조사. => [Ideone](www.ideone.com)
	* 이들을 모방? => Y
	* 특정 기능 구현? 개선? => 구현

## TODO List
1. **1단계 : 세상에서 가장 간단한 웹 컴파일러 만들기**
	1. ~~코드 입력받을 텍스트 박스와 컴파일 버튼 생성. Code Highlighter 적용.~~ (최형진, 2017/11/22)
		* ~~[HTML textarea tag](https://www.w3schools.com/tags/tag_textarea.asp)~~ 
		* ~~[HTML Forms](https://www.w3schools.com/html/html_forms.asp)~~
		* ~~[PHP Form](https://www.w3schools.com/php/php_forms.asp)~~
		* ~~[CodeMirror](http://codemirror.net/index.html)~~
	2. ~~PHP에서 쉘 코드(C언어 컴파일 코드) 실행~~ (최형진, 2017/11/22)
		* ~~[How to compile & execute C program on Linux](http://www.codecoffee.com/tipsforlinux/articles/18.html)~~
	3. ~~컴파일 및 실행 결과를 출력~~ (최형진, 2017/11/22)
		* ~~[PHP: 실행 연산자](http://php.net/manual/kr/language.operators.execution.php)~~
		* ~~[PHP: shell_exec](http://php.net/manual/kr/function.shell-exec.php)~~
	* 개선 사항
		* ~~초기화 버튼 만들기~~ ()
		* ~~코드 작성 및 컴파일 후에 에디터 안에 코드가 남아있어야 한다.~~ (이태희, 2017/11/27)
		* ~~입력 작성 및 실행 후에도 입력 안에 데이터가 남아있어야 한다.~~(이태희, 2017/11/27)
2. **2단계 : 세션 기능 추가**
	1. ~~사이트 첫 방문시 모든 것이 초기화 상태(빈 파일)이어야 한다.~~
	2. ~~사이트 접속 종료시 남아있는 파일들을 제거해야 한다.~~
		* ~~[PHP Session](https://www.w3schools.com/php/php_sessions.asp)~~
		* ~~[Blog: Session이란?](http://88240.tistory.com/190)~~
3. **3단계 : 보안 기능 추가**
	1. Sandboxing using Docker
		* [Easy deploy with Docker](http://blog.nacyot.com/articles/2014-01-27-easy-deploy-with-docker/)

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
* [PHP Session](https://www.w3schools.com/php/php_sessions.asp)
* [Blog: Session이란?](http://88240.tistory.com/190)

## License
MIT License