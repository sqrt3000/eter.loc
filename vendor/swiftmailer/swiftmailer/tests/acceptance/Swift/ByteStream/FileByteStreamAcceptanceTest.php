<?php

class Swift_ByteStream_FileByteStreamAcceptanceTest extends \PHPUnit_Framework_TestCase
{
    private $_testFile;

    protected function setUp()
    {
        $this->_testFile = sys_get_temp_dir().'/swift-test-files'.__CLASS__;
        file_put_contents($this->_testFile, 'abcdefghijklm');
    }

    protected function tearDown()
    {
        unlink($this->_testFile);
    }

    public function testFileDataCanBeRead()
    {
        $file = $this->_createFileStream($this->_testFile);
        $str = '';
        while (false !== $bytes = $file->read(8192)) {
            $str .= $bytes;
        }
        $this->assertEquals('abcdefghijklm', $str);
    }

    public function testFileDataCanBeReadSequentially()
    {
        $file = $this->_createFileStream($this->_testFile);
        $this->assertEquals('abcde', $file->read(5));
        $this->assertEquals('fghijklm', $file->read(8));
        $this->assertFalse($file->read(1));
    }

    public function testFilenameIsReturned()
    {
        $file = $this->_createFileStream($this->_testFile);
        $this->assertEquals($this->_testFile, $file->getPath());
    }

    public function testFileCanBeWrittenTo()
    {
        $file = $this->_createFileStream($this->_testFile, true);
        $file->write('foobar');
        $this->assertEquals('foobar', $file->read(8192));
    }

    public function testReadingFromThenWritingToFile()
    {
        $file = $this->_createFileStream($this->_testFile, true);
        $file->write('foobar');
        $this->assertEquals('foobar', $file->read(8192));
        $file->write('zipbutton');
        $this->assertEquals('zipbutton', $file->read(8192));
    }

    public function testWritingToFileWithCanonicalization()
    {
        $file = $this->_createFileStream($this->_testFile, true);
        $file->addFilter($this->_createFilter(array("\r\n", "\r"), "\n"), 'allToLF');
        $file->write("foo\r\nbar\r");
        $file->write("\nzip\r\ntest\r");
        $file->flushBuffers();
        $this->assertEquals("foo\nbar\nzip\ntest\n", file_get_contents($this->_testFile));
    }

    public function testWritingWithFulleMessageLengthOfAMultipleOf8192()
    {
        $file = $this->_createFileStream($this->_testFile, true);
        $file->addFilter($this->_createFilter(array("\r\n", "\r"), "\n"), 'allToLF');
        $file->write('');
        $file->flushBuffers();
        $this->assertEquals('', file_get_contents($this->_testFile));
    }

    public function testBindingOtherStreamsMirrorsWriteOperations()
    {
        $file = $this->_createFileStream($this->_testFile, true);
        $is1 = $this->_createMockInputStream();
        $is2 = $this->_createMockInputStream();

        $is1->expects($this->at(0))
            ->method('write')
            ->with('x');
        $is1->expects($this->at(1))
            ->method('write')
            ->with('y');
        $is2->expects($this->at(0))
            ->method('write')
            ->with('x');
        $is2->expects($this->at(1))
            ->method('write')
            ->with('y');

        $file->bind($is1);
        $file->bind($is2);

        $file->write('x');
        $file->write('y');
    }

    public function testBindingOtherStreamsMirrorsFlushOperations()
    {
        $file = $this->_createFileStream(
            $this->_testFile, true
            );
        $is1 = $this->_createMockInputStream();
        $is2 = $this->_createMockInputStream();

        $is1->expects($this->once())
            ->method('flushBuffers');
        $is2->expects($this->once())
            ->method('flushBuffers');

        $file->bind($is1);
        $file->bind($is2);

        $file->flushBuffers();
    }

    public function testUnbindingStreamPreventsFurtherWrites()
    {
        $file = $this->_createFileStream($this->_testFile, true);
        $is1 = $this->_createMockInputStream();
        $is2 = $this->_createMockInputStream();

        $is1->expects($this->at(0))
            ->method('write')
            ->with('x');
        $is1->expects($this->at(1))
            ->method('write')
            ->with('y');
        $is2->expects($this->once())
            ->method('write')
            ->with('x');

        $file->bind($is1);
        $file->bind($is2);

        $file->write('x');

        $file->unbind($is2);

        $file->write('y');
    }

    private function _createFilter($search, $replace)
    {
        return new Swift_StreamFilters_StringReplacementFilter($search, $replace);
    }

    private function _createMockInputStream()
    {
        return $this->getMockBuilder('Swift_InputByteStream')->getMock();
    }

    private function _createFileStream($file, $writable = false)
    {
        return new Swift_ByteStream_FileByteStream($file, $writable);
    }
}
