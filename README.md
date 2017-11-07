# 2017-2 Internet Programming Team Project : Web Compiler
* 서예찬
* 이태희
* 최형진
## TODO List
1. **1단계 : 세상에서 가장 간단한 웹 컴파일러 만들기**
	1. 코드 입력받을 텍스트 박스와 컴파일 버튼 생성
	2. PHP에서 쉘 코드(C언어 컴파일 코드) 실행
	3. 컴파일 및 실행 결과를 출력
2. **2단계 : 표준입출력 및 다양한 언어 지원**
	1. stdin 받을 텍스트 박스와 stdout 뱉을 텍스트 박스 생성
	2. g++, java, php 등 다른 언어 선택할 수 있는 리스트박스 생성
3. **3단계 : Sandboxing과 Code Highlighter 적용**
	1. Sandboxing using Docker
	2. Code highlighting using CodeMirror
4. 4단계 : 희망사항(**시간 나면 하자**)
	1. 계정 기능
	2. 디버깅 기능
	3. VM 콘솔 기능

## Reference
* [How to build an web compiler](http://hashcode.co.kr/questions/3530/%EC%9B%B9-%EC%BB%B4%ED%8C%8C%EC%9D%BC%EB%9F%AC-%EB%A7%8C%EB%93%A4%EA%B8%B0)
* 악의적인 코드를 막기 위한 Sandboxing => [Easy deploy with Docker](http://blog.nacyot.com/articles/2014-01-27-easy-deploy-with-docker/)
* 코드를 예쁘게 보여주는 Code Highlighter => [CodeMirror](http://codemirror.net/index.html)
