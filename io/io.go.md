在io.go的代码段中，有一段都是用来定义接口的。  
```go
1、type Reader interface {}  
2、type Writer interface {}  
3、type Closer interface {}  
4、type Seeker interface {}  
5、type ReadWriter interface {}  
6、type ReadCloser interface {}  
7、type WriteCloser interface {}  
8、type ReadWriteCloser interface {}  
9、type ReadSeeker interface {}  
10、type WriteSeeker interface {}  
11、type ReadWriteSeeker interface {}  
12、type ReaderFrom interface {}  
13、type WriterTo interface {}  
14、type ReaderAt interface {}  
15、type WriterAt interface {}  
16、type ByteReader interface {}  
17、type ByteScanner interface {}  
18、type ByteWriter interface {}  
19、type RuneReader interface {}  
20、type RuneScanner interface {}  
21、type stringWriter interface {}  //私有
```
一共21个……这么多。目前来说，我并不知道他们的实际用处。  

接下来，又定义了几组对外的公有函数：   
```go
1、func WriteString(w Writer, s string) (n int, err error) {}  
2、func ReadAtLeast(r Reader, buf []byte, min int) (n int, err error) {}  
3、func ReadFull(r Reader, buf []byte) (n int, err error) {}  
4、func CopyN(dst Writer, src Reader, n int64) (written int64, err error) {}  
5、func Copy(dst Writer, src Reader) (written int64, err error) {}  
6、func CopyBuffer(dst Writer, src Reader, buf []byte) (written int64, err error) {}  
7、func copyBuffer(dst Writer, src Reader, buf []byte) (written int64, err error) {}  //私有
8、func LimitReader(r Reader, n int64) Reader { return &LimitedReader{r, n} }  
9、func TeeReader(r Reader, w Writer) Reader {}
```

最后，定义了几组对象：
```go
type LimitedReader struct {
	R Reader // underlying reader
	N int64  // max bytes remaining
}
func (l *LimitedReader) Read(p []byte) (n int, err error) {}
func NewSectionReader(r ReaderAt, off int64, n int64) *SectionReader {}  
```

```go
type SectionReader struct {
	r     ReaderAt
	base  int64
	off   int64
	limit int64
}
func (s *SectionReader) Read(p []byte) (n int, err error) {}
func (s *SectionReader) Seek(offset int64, whence int) (int64, error) {}
func (s *SectionReader) ReadAt(p []byte, off int64) (n int, err error) {}
func (s *SectionReader) Size() int64 { return s.limit - s.base }
```

```go
type teeReader struct {
	r Reader
	w Writer
}
func (t *teeReader) Read(p []byte) (n int, err error) {
```
